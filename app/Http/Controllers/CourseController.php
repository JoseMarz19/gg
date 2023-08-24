<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function index(){
        return view('courses.index');

    }


    public function show(Course $course){

        $this->authorize('published', $course);

        $similares = Course::where('category_id', $course->category_id)
                            ->where('id','!=', $course->id)
                            ->where('status',3)
                            ->latest('id')
                            ->take(5)
                            ->get();

        return view('courses.show', compact('course', 'similares'));
    }


   /*  public function enrolled(Course $course){

        $userId = auth()->user()->id;


        $folderPath = "public/students/{$course->id}/{$userId}";
        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath);
        }


        $course->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status', $course);
    }
 */

 public function enrolled(Course $course)
{
    $userId = auth()->user()->id;

    $folderPath = "public/students/{$course->id}/{$userId}";
    if (!Storage::exists($folderPath)) {
        Storage::makeDirectory($folderPath);
    }
  // Obtener la fecha actual de inscripción
  $enrollmentDate = today();

  // Agregar al usuario a la tabla intermedia 'course_user' con la fecha de inscripción
  $course->students()->attach($userId, ['created_at' => $enrollmentDate]);

  return redirect()->route('courses.status', $course);
}

public function miscursos(Course $course)
{
     $course = auth()->user()->id;
    return view('courses.miscursos',['course'=>$course]);
}




}

