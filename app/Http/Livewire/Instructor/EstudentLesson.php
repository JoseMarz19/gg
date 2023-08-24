<?php

namespace App\Http\Livewire\Instructor;


use App\Models\Course;
use App\Models\User;
use App\Models\Studentsresource;




use Livewire\Component;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedResource;
use App\Mail\RejectResource;

class EstudentLesson extends Component
{

    public $student, $course, $user;

    public function mount(User $student, Course $course)
    {

        $this->student = $student;
        $this->course = $course;
        
    }


    public function download($url)
{
    return response()->download(storage_path('app/' . $url));
}



    public function updateStatus($lessonId, $status ,User $student)
    {
        
        $lesson = Studentsresource::findOrFail($lessonId);
        $lesson->update([
            'checked' => $status,
        ]);

        $authenticatedUserId = auth()->user()->id;

       
        switch ($status) {
            case 2:
                $mail = new RejectResource($student, $lesson, $authenticatedUserId);
                Mail::to($student->email)->send($mail);
                break;
            case 3:
                $mail = new ApprovedResource($student, $lesson, $authenticatedUserId);
                Mail::to($student->email)->send($mail);
                break;
            // Puedes agregar más casos si es necesario
        }
        
    }




    public function render()
    {

        return view('livewire.instructor.estudent-lesson');
    }
}
