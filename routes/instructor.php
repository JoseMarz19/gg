<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
use App\Http\Livewire\Instructor\StudentDetails;
use App\Http\Livewire\Instructor\StudentAddCourse;

Route::redirect('', 'instructor/courses');

Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar cursos')->name('courses.curriculum');

Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

// Ruta para listar los estudiantes de un curso
Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:Actualizar cursos')->name('courses.students');


// Ruta para añadir agregar a los estudiantes a un curso

Route::get('courses/{course}/studentsaddcourse', StudentAddCourse::class)->middleware('can:Actualizar cursos')->name('courses.studentsaddcourse');


// Ruta para mostrar los detalles de un estudiante en un curso específico


Route::get('courses/{course}/studentsdetails-id-{student}', [CoursesStudents::class, 'renderDetails'])->middleware('auth')->name('courses.studentsdetails');










Route::POST('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');
