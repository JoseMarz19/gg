<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!! $this->current->iframe !!}
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4">
                {{ $current->name }}
            </h1>

            @if ($current->description)
                <div class="text-gary-600">
                    {{ $current->description->name }}
                </div>
            @endif

            <div class="flex justify-between mt-4">
                {{-- MARCAR COMO CULMINADO --}}
                <div class="flex items-center cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-yellow-600"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                    @endif
                    <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
                </div>

                @if ($current->resource)
                    <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg text-blue-500"></i>
                        <p class="text-sm ml-2">Descargar recurso</p>
                    </div>
                @endif
            </div>

            <div class="card mt-2">
                <div class="card-body flex font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{ $this->previous->id }})"
                            class="cursor-pointer text-amber-600">Tema anterior</a>
                    @endif

                    @if ($this->next)
                        <a wire:click="changeLesson({{ $this->next->id }})"
                            class="ml-auto cursor-pointer text-blue-500">Siguiente tema</a>
                    @endif
                </div>
            </div>

            {{-- PRUEBA DE ARCHIVOS POR ALUMNO --}}
            <div class="mb-4">
                @livewire('students-resources', ['course' => $course, 'currentLessonId' => $current->id], key('students-resources-' . $current->id))
            </div>
            {{-- PRUEBA DE ARCHIVOS POR ALUMNO --}}

            {{-- PRUEBA DE COMENTARIOS POR ALUMNO --}}
            <div class="mb-4">
                @livewire('students-comments', ['course' => $course, 'currentLessonId' => $current->id], key('students-comments-' . $current->id))
            </div>
            {{-- PRUEBA DE COMENTARIOS POR ALUMNO --}}
        </div>

        <div>
            <div class="card">
                <div class="card-body">
                    <h1 class="text-2xl leading-8 text-center mb-4 mr-2">{{ $course->title }}</h1>
                </div>
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-2 ml-4"
                            src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>
                    <div>
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-blue-500 text-sm"
                            href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>

               {{-- BARRA DE PROGRESO --}}
<div class="relative pt-1">
    <div class="flex mb-2 items-center justify-between">
        <div>
            <span
                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200 mt-2 ml-4">
                COMPLETADO
            </span>
        </div>
        <div class="text-right">
            <span class="text-xs font-semibold inline-block text-blue-600 mt-2 mr-4">
                {{ $this->advance . '%' }} {{-- Utiliza la propiedad advance --}}
            </span>
        </div>
    </div>
    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200 ml-2 mr-2">
        <div style="width:{{ $this->advance . '%' }}"
            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500">
        </div>
    </div>
</div>
{{-- BARRA DE PROGRESO --}}

                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2 ml-4">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex ml-4">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 border-2 border-yellow-500 rounded-full mr-1 mt-1"></span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 bg-yellow-500 rounded-full mr-1 mt-1"></span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-1 mt-1"></span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-1 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})">
                                            {{ $lesson->name }}
                                            @if ($lesson->completed)
                                                (Completado)
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
