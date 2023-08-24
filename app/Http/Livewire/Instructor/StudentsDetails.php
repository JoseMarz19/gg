<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;
use App\Models\Studentsresource;
use ZipArchive; // Importar la clase ZipArchive

class StudentsDetails extends Component
{

    public $student, $course;

    public function mount(User $student, Course $course){

        $this->student = $student;
        $this->course = $course;
    }


    public function render()
    {
        return view('livewire.instructor.students-details');
    }

public function getAdvanceProperty()
{
    $completedLessonsCount = $this->course->lessons->filter(function ($lesson) {
        return $lesson->users->contains($this->student->id);
    })->count();

    $totalLessonsCount = $this->course->lessons->count();

    if ($totalLessonsCount === 0) {
        return 0;
    }

    $advance = ($completedLessonsCount * 100) / $totalLessonsCount;
    return round($advance, 2);
}


    public function downloader()
    {
        // Buscar en la tabla studentsresources por course_id y user_id
        $resources = Studentsresource::where('course_id', $this->course->id)
            ->where('user_id', $this->student->id)
            ->get();

        if ($resources->isEmpty()) {
            // Si no se encontraron recursos, mostrar un mensaje o realizar alguna acción
            // (por ejemplo, redireccionar o mostrar un mensaje de error)
            return;
        }

        // Crear un archivo zip
        $zip = new ZipArchive;
        $zipFileName = 'carpeta_del_estudiante_' . $this->student->name .'_' .$this->course->title .'.zip';
        $zip->open(public_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Agregar cada recurso al archivo zip
        foreach ($resources as $resource) {
            // $resource->url contiene la URL del recurso
            // Aquí asumo que los recursos están almacenados en la carpeta 'storage/app/public'
            // Si están almacenados en otro lugar, ajusta la ruta en la función addFile
            $resourcePath = storage_path('app/' . $resource->url);
            $zip->addFile($resourcePath, basename($resource->url));
        }

        // Cerrar el archivo zip
        $zip->close();

        // Devolver el archivo zip al usuario para que pueda descargarlo
        return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
    }







}
