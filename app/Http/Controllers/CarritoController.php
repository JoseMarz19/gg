<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class CarritoController extends Controller
{
    public function agregar(Course $course)
    {
        // Obtener el carrito de la sesión o crearlo si no existe
        $carrito = Session::get('carrito', []);

        // Agregar el curso al carrito
        $carrito[$course->id] = $course;

        // Guardar el carrito en la sesión
        Session::put('carrito', $carrito);

        // Redireccionar a la página del curso o a donde desees
        return redirect()->route('course.show', $course);
    }

    public function ver()
    {
        // Obtener el carrito de la sesión
        $carrito = Session::get('carrito', []);

        // Puedes pasar el carrito a una vista y mostrar los cursos agregados
        return view('carrito.ver', compact('carrito'));
    }
}
