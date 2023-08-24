<div>

    <div class="flex justify-between items-center"s>
    <h1 class="text-2xl font-bold mb-4">ESTUDIANTES DEL CURSO</h1>


    <a href="{{ route('instructor.courses.studentsaddcourse', ['course' => $course]) }}"
        class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Agregar Alumnos
    </a>


</div>

    <x-table-responsive>
        {{-- BARRA DE BUSQUEDA --}}
        <div class="overflow-hidden z-0 rounded-full relative p-1">
            <form role="form" class="relative flex z-50 rounded-full" autocomplete="off">
                <input wire:model="search" type="text" placeholder="Ingresa el nombre de un estudiante"
                    class="rounded-full flex-1 px-6 py-2 text-gray-700 focus:outline-none" />


                </form>

            <div class="glow glow-1 z-10 animate-glow1 bg-pink-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute">
            </div>
            <div class="glow glow-2 z-20 animate-glow2 bg-purple-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute">
            </div>
            <div class="glow glow-3 z-30 animate-glow3 bg-yellow-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute">
            </div>
            <div class="glow glow-4 z-40 animate-glow4 bg-blue-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute">
            </div>
        </div>
        {{-- BARRA DE BUSQUEDA --}}
        <br>

        @if ($students->count())


            <table class="w-full">
                <thead>
                    <tr
                        class="text-md font-semibold tracking-wide text-center text-gray-900 uppercase border-b  bg-pink-300">
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Numero</th>
                        <th class="px-4 py-3">Correo</th>
                        <th class="px-4 py-3">Progreso</th>
                        <th class="px-4 py-3">Opciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($students as $student)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">

                                        <img id="picture"
                                            class="rounded-full w-full h-full object-cover object-center"
                                            src="{{ $student->profile_photo_url }}">


                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>

                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-black">
                                            {{ $student->name }}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-ms font-semibold border text-center">
                                <div>
                                    <p class="text-sm text-gray-900">{{ $student->phone }}</p>

                                </div>
                            </td>
                            <td class="px-4 py-3 text-ms font-semibold border text-center">
                                <div>
                                    <p class="text-sm text-gray-900">{{ $student->email }}</p>

                                </div>
                            </td>

                            <td class="px-4 py-3 text-ms font-semibold border text-center">
                                {{-- BARRA DE PROGRESO --}}
                                <div class="relative pt-1">
                                    <div class="flex mb-2 items-center justify-between">
                                        <div class="text-right">
                                            @php
                                                $completedLessonsCount = $course->lessons
                                                    ->filter(function ($lesson) use ($student) {
                                                        return $lesson->users->contains($student->id);
                                                    })
                                                    ->count();

                                                $totalLessonsCount = $course->lessons->count();

                                                if ($totalLessonsCount === 0) {
                                                    $advance = 0;
                                                } else {
                                                    $advance = ($completedLessonsCount * 100) / $totalLessonsCount;
                                                }
                                            @endphp
                                            <span class="text-xs font-semibold inline-block text-blue-600 mt-2 mr-4">
                                                {{ round($advance, 2) . '%' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200 ml-2 mr-2">
                                        <div style="width:{{ round($advance, 2) . '%' }}"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500">
                                        </div>
                                    </div>
                                </div>
                                {{-- BARRA DE PROGRESO --}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('instructor.courses.studentsdetails', ['course' => $course, 'student' => $student->id]) }}"
                                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    Detalles
                                </a>

                                <button wire:click="unenroll({{ $student->id }})"
                                    class="text-white bg-gradient-to-r from-orange-500 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    Eliminar
                            </button>
                            </td>


                        </tr>
                    @endforeach


                </tbody>
            </table>


            <div class="px-6 py-4">
                {{ $students->links() }}
            </div>

        @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente :(
            </div>

        @endif


    </x-table-responsive>

</div>
