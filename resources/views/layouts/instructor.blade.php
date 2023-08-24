<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->


        <!-- Page Content -->
        <div class="container py-8 grid grid-cols-5">

            <aside>
                <h1 class="font-bold text-lg text-center mb-4">Edicion del curso</h1>

                <ul class="text-sm text-gray-600 mb-4">
                    <li
                        class="leading-7 mb-1 border-l-4  @routeIs('instructor.courses.edit', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <i class="fas fa-info mr-3"></i><a
                            href="{{ route('instructor.courses.edit', $course) }}">Informacion del curso</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <i class="fas fa-edit text-yellow-400 mr-2"></i><a
                            href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones del curso</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i><a
                            href="{{ route('instructor.courses.goals', $course) }}">Metas del curso</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <i class="fas fa-users text-blue-400 mr-2"></i><a
                            href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                    </li>

                
                    @if ($course->observation)
                    <li
                    class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.observation', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                    <i class="fas fa-exclamation-triangle text-red-400 mr-2"></i><a
                        href="{{ route('instructor.courses.observation', $course) }}">Observaciones</a>
                </li>
                    @endif
                </ul>


                @switch($course->status)
                    @case(1)
                        <form action="{{route('instructor.courses.status', $course) }}" method="POST">
                            @csrf

                            <button class="btn btn-danger_rojo">SOLICITAR REVISIÓN</button>

                        </form>
                    @break

                    @case(2)
                        <span class="px-2 py-1 font-bold leading-tight  text-white bg-orange-400">
                            ESTE CURSO ESTA EN REVISIÓN </span>
                    @break

                    @case(3)
                        <span class="px-2 py-1 font-bold leading-tight  text-white bg-green-400">
                            ESTE CURSO ESTA PUBLICADO </span>
                    @break

                    @default
                @endswitch





            </aside>

            <div class="col-span-4 card">
                <main class="card-body text-gray-600">

                    {{ $slot }}

                </main>

            </div>

        </div>
    </div>

    @stack('modals')

    @livewireScripts


    @isset($js)
        {{ $js }}
    @endisset



</body>

</html>
