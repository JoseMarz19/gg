@php
    $user = Auth::user();
    $miscursos = $user->courses;

    // Calcular el total a pagar sumando los precios de los cursos en el carrito
    $totalAPagar = 0;
    foreach ($miscursos as $course) {
        $totalAPagar += $course->price->value;
    }
@endphp

<x-app-layout>
    <!-- Listado principal de cursos -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-8">
        @if ($miscursos === null || count($miscursos) === 0)
            <div class="text-center w-full">
                <p class="text-4xl font-bold text-gray-600">
                    😞 Lo siento, aún no tienes ningún curso en el carrito. 😞
                </p>
            </div>
        @else
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
                                <!-- Resto de estrellas -->
                            </ul>
                            {{-- Numero de estudiantes dentro del curso --}}
                            <p class="text-xs text-gray-500 ml-auto">
                                <i class="fas fa-users"></i> {{ $course->students_count }}
                            </p>
                        </div>
                        {{-- Descripcion de precio del curso --}}
                        <div class="flex justify-center">
                            @if ($course->price->value == 0)
                                <p class="text-green-600 font-bold"><i class="fa fa-arrow-right"></i> GRATIS <i
                                        class="fa fa-arrow-left"></i></p>
                            @else
                                <p class="text-orange-500 font-bold"><i class="fa fa-arrow-right"></i> MXN
                                    ${{ $course->price->value }} <i class="fa fa-arrow-left"></i></p>
                            @endif
                        </div>
                        {{-- Boton para la ruta  --}}
                        <div class="flex justify-center mt-auto">
                            <a href="{{ route('courses.status', $course) }}"
                                class="btn-block btn-primary text-xs py-1 px-2 rounded">
                                Ver más
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        @endif
    </div>

<!-- Sección de cursos en el carrito -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    @if (count($miscursos) === 0)
        <div class="text-center w-full">
            <p class="text-4xl font-bold text-gray-600">
                😞 Lo siento, aún no tienes ningún curso en el carrito. 😞
            </p>
        </div>
    @else
        <h1 class="text-2xl font-bold mb-4">Cursos en el carrito:</h1>
        <ul>
            @foreach ($miscursos as $course)
                <li>{{ $course->title }} - ${{ $course->price->value }}</li>
            @endforeach
        </ul>

        <!-- Código para la suma de precios de los cursos en el carrito -->
        <h2 class="text-2xl font-bold mt-4">Total a pagar: ${{ $totalAPagar }}</h2>
    @endif
</div>
</x-app-layout>
