<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StudentAddCourse extends Component
{

    public $course, $search, $user;
    public $selected = [];

    public function mount(Course $course){

        $this->course = $course;


    }


    public function enrolled($userId)
    {
        $user = User::find($userId);

        $folderPath = "public/students/{$this->course->id}/{$user->id}";
        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath);
        }

        // Obtener la fecha actual de inscripción
        $enrollmentDate = now();

        // Agregar al usuario a la tabla intermedia 'course_user' con la fecha de inscripción
        $this->course->students()->attach($user, ['created_at' => $enrollmentDate]);

        return redirect()->route('instructor.courses.studentsaddcourse', $this->course);
    }

    public function enrollSelected()
    {
        foreach ($this->selected as $userId) {
            $this->enrolled($userId);
        }

        // Limpiar los usuarios seleccionados después de inscribirlos
        $this->selected = [];
    }

    public function updatedSelected()
    {
        $this->emit('updateSelectedCount', count($this->selected));
    }




    public function render(Course $course, User $students)
    {
        $students = User::leftJoin('course_user', function ($join) {
            $join->on('users.id', '=', 'course_user.user_id')
                 ->where('course_user.course_id', '=', $this->course->id);
        })
        ->whereNull('course_user.user_id')
    ->where(function ($query) {
        $query->where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone', 'LIKE', '%' . $this->search . '%');
    })
    ->select('users.*')
    ->paginate(10);

    return view('livewire.instructor.student-add-course', compact('course','students'))->layout('layouts.instructor', ['course' => $this->course]);
    }
}
