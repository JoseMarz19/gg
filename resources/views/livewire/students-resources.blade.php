<div class="card">
    <div class="card-body bg-gray-100">
        <header>
            <h1>Subir archivo de la lección...</h1>
        </header>

        <div>
            <hr class="my-2">
            @php
                $user = Auth::user();
                $studentResource = DB::table('studentsresources')
                    ->where('user_id', $user->id)
                    ->where('course_id', $course->id)
                    ->where('lesson_id', $currentLessonId)
                    ->first();
            @endphp


            @if ($studentResource)
                <div class="flex justify-between items-center">
                    <p><i wire:click="download" class="fas fa-download text-blue-500 mr-2 cursor-pointer">Se ha subido
                        correctamente el archivo</i>
                    </p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>

                </div>
            @else
                <div>
                    <form wire:submit.prevent="save">
                        <div class="flex items-center">
                            <input wire:model="file" type="file" class="form-input flex-1">
                            <button class="btn btn-primary_azul text-sm ml-2">Subir</button>
                        </div>

                        <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                            Cargando...
                        </div>

                        @error('file')
                            <span class="text-xs text-red-500">Error al cargar el archivo</span>
                        @enderror
                    </form>
                </div>
            @endif



        </div>
    </div>
</div>
