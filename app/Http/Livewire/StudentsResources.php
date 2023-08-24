<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class StudentsResources extends Component
{

    use WithFileUploads;

    public $course, $file, $currentLessonId;

    public function mount(Course $course, $currentLessonId)
    {
        $this->course = $course;
        $this->currentLessonId = $currentLessonId;
    }

    public function render()
    {
        $user = Auth::user();

        $studentResource = DB::table('studentsresources')
            ->where('user_id', $user->id)
            ->where('course_id', $this->course->id)
            ->where('lesson_id', $this->currentLessonId)
            ->first();

        return view('livewire.students-resources', [
            'studentResource' => $studentResource
        ]);
    }



    public function save()
    {
        // Validar que el campo 'file' esté presente y no esté vacío
        $this->validate([
            'file' => 'required'
        ]);

        // Obtener el ID del usuario autenticado
        $userId = auth()->user()->id;

        // Obtener el ID del curso actual
        $courseId = $this->course->id;

        $section = $this->course->sections->first(); // Obtener la primera sección del curso

        if ($section) {
            $lesson = $section->lessons->first(); // Obtener la primera lección de la sección
            $lessonId = $lesson->id; // Obtener el ID de la lección
        } else {
            // Manejar el caso en el que no haya secciones o lecciones asociadas al curso
        }


        // Construir la ruta del directorio de almacenamiento
        $folderPath = "public/students/{$courseId}/{$userId}";

        // Verificar si el directorio no existe
        if (!Storage::exists($folderPath)) {
            // Crear el directorio con los permisos 0755 (rwxr-xr-x)
            Storage::makeDirectory($folderPath, 0755, true);
        }

        // Guardar el archivo en la ubicación especificada
        $url = $this->file->store($folderPath);

        $this->course->studentsresource()->create([
            'url' => $url,
            'course_id' => $this->course->id,
            'lesson_id' => $this->currentLessonId, // Utilizar el valor de $currentLessonId
            'user_id' => $userId,
            'checked' => false
        ]);

        $this->course = Course::find($this->course->id);
    }


    public function destroy()
    {
        // Eliminar el archivo del almacenamiento
        // Buscar el recurso de estudiante existente
        $studentResource = $this->course->studentsresource()
            ->where('lesson_id', $this->currentLessonId)
            ->first();

        if ($studentResource) {
            // Eliminar el archivo del almacenamiento
            Storage::delete($studentResource->url);

            // Eliminar el recurso de estudiante
            $studentResource->delete();
        }
    }






    public function download()
    {
        $user = Auth::user();
        $studentResource = DB::table('studentsresources')
            ->where('user_id', $user->id)
            ->where('course_id', $this->course->id)
            ->where('lesson_id', $this->currentLessonId) // Utilizar el valor de $currentLessonId
            ->first();

        if ($studentResource) {
            return response()->download(storage_path('app/' . $studentResource->url));
        } else {
            // Manejar el caso en el que no exista un recurso del estudiante para el usuario actual, el curso y la lección
        }
    }
}
