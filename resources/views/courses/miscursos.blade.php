@php
    $user = Auth::user();
    $miscursos = $user->courses ?? [];
@endphp

<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-8">
        @foreach ($miscursos as $course)
        <article class="card">
            <a href="{{ route('courses.status', $course) }}">
                <img class="h-40 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
            </a>
                <div class="card-body flex-1 flex flex-col">
                    <h1 class="card-title min-h-16">{{ Str::limit($course->title, 30) }}</h1>
                    <p class="text-gray-500 text-sm mb-2 mt-auto">Prof: {{ $course->teacher->name }}</p>

                    {{-- Numero de estrellas del curso --}}
                    <div class="flex mb-2">
                        <ul class="flex text-sm">
                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                            </li>

                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                            </li>

                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                            </li>

                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                        </ul>
                        {{-- Numero de estudiantes dentro del curso --}}
                        <p class="text-xs text-gray-500 ml-auto">
                            <i class="fas fa-users"></i> {{ $course->students_count }}
                        </p>
                    </div>
                    {{-- Descripcion de precio del curso --}}
                    <div class="flex justify-center">
                        @if ($course->price->value == 0)
                            <p class="text-green-600 font-bold"><i class="fa fa-arrow-right"></i> GRATIS <i class="fa fa-arrow-left"></i></p>
                        @else
                            <p class="text-orange-500 font-bold"><i class="fa fa-arrow-right"></i> MXN ${{ $course->price->value }} <i class="fa fa-arrow-left"></i></p>
                        @endif
                    </div>
                        {{-- Boton para la ruta  --}}
                    <div class="flex justify-center mt-auto">
                        <a href="{{ route('courses.status', $course) }}" class="btn-block btn-primary text-xs py-1 px-2 rounded">
                            Ver más
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>




</x-app-layout>








    {{-- <div class="container mx-auto py-4">
        @foreach ($miscursos as $course)
            <article class="card">
                <a href="{{ route('courses.status', $course) }}">
                    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                </a>
                <div class="card-body flex-1 flex flex-col">
                    <h1 class="card-title min-h-16">{{ Str::limit($course->title, 40) }}</h1>
                    <p class="text-gray-500 text-sm mb-2 mt-auto">Prof: {{ $course->teacher->name }}</p>

                    <div class="flex mb-2">
                        <ul class="flex text-sm">
                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                                <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                <i class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <!-- Rest of the star rating -->
                        </ul>
                        <p class="text-sm text-gray-500 ml-auto">
                            <i class="fas fa-users"></i>
                            {{ $course->students_count }}
                        </p>
                    </div>

                    @if ($course->price->value == 0)
                        <div class="flex justify-center">
                            <p class="text-green-600 font-bold"><i class="fa fa-arrow-right"></i> GRATIS <i class="fa fa-arrow-left"></i></p>
                        </div>
                    @else
                        <div class="flex justify-center">
                            <p class="text-orange-500 font-bold"><i class="fa fa-arrow-right"></i> MXN ${{ $course->price->value }} <i class="fa fa-arrow-left"></i></p>
                        </div>
                    @endif

                    <div class="flex justify-center">
                        <a href="{{ route('courses.status', $course) }}" class="btn-block btn-primary rounded">
                            Ver más
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div> --}}



{{--
    <body>
        @foreach($miscursos as $course)
        <section class="bg-fuchsia-700 mb-4">
            <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6 py-4">
                <div class="text-white">
                    <h1 class="text-4xl text-white">{{ $course->title }}</h1>
                    <h1 class="text-xl mb-3 text-white">{{ $course->subtitle }}</h1>
                    <p class="mb-3"><i class="fas fa-chart-line text-green-300"></i> {{ $course->level->name }}</p>
                    <a href="{{ route('courses.status', $course) }}" class="btn btn-primary">Ir al curso</a>
                </div>
                <figure>
                    <a href="{{ route('courses.status', $course) }}">
                        <img class="aspect-w-1 aspect-h-1 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                    </a>

                </figure>
            </div>
        </section>


            <!-- Aquí puedes continuar con el resto de la información de los cursos -->
        @endforeach --}}
