<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Livewire\CourseStatus;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('cursos' , [CourseController::class, 'index'])->name('courses.index');


Route::get('cursos/{course}' ,[CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('courses-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');

Route::get('courses/miscursos' , [CourseController::class, 'miscursos'])->middleware('auth')->name('courses.miscursos');

// Ruta para agregar un curso al carrito de compras
Route::post('courses/{course}/agregar', [CourseController::class, 'agregar'])->name('courses.agregar');

// Ruta para ver el contenido del carrito de compras
Route::get('courses/carrito', [CourseController::class, 'ver'])->name('courses.carrito');
