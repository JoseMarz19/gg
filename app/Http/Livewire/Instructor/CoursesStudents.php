<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\User;
use App\Models\Studentsresource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive; // Importar la clase ZipArchive



use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesStudents extends Component
{

    use WithPagination;

    use AuthorizesRequests;


    public $course, $search;

    public function mount(Course $course){

        $this->course = $course;

        $this->authorize('dicatated', $course);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function getAdvanceProperty(User $student)
    {
        $completedLessonsCount = $this->course->lessons->filter(function ($lesson) use ($student) {
            return $lesson->users->contains($student->id);
        })->count();

        $totalLessonsCount = $this->course->lessons->count();

        if ($totalLessonsCount === 0) {
            return 0;
        }

        $advance = ($completedLessonsCount * 100) / $totalLessonsCount;
        return round($advance, 2);
    }


    public function unenroll($userId)
    {
        $user = User::find($userId);

        // Eliminar la carpeta del estudiante
        $folderPath = "public/students/{$this->course->id}/{$user->id}";
        if (Storage::exists($folderPath)) {
            Storage::deleteDirectory($folderPath);
        }

        // Desvincular al usuario de la tabla intermedia 'course_user'
        $this->course->students()->detach($user);

        return redirect()->route('instructor.courses.students', $this->course);
    }



    public function render()
    {

        $students = $this->course->students()
        ->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $this->search . '%');
        })
        ->select('users.*')
        ->paginate(10);

        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor', ['course' => $this->course]);
    }

   // CoursesStudents.php

public function renderDetails(Course $course, User $student)
{

    return view('livewire.instructor.student-details', compact('course','student'));
}


// Funcion para descar la carpeta del estudiante
public function downloader(Course $course, User $student)
{

    return view('livewire.instructor.student-details', compact('course','student'));
}



}
