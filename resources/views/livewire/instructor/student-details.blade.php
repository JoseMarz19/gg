@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="container">
        @if ($student)
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <!-- Enlaces de navegación -->
                <i class="far fa-arrow-alt-circle-left"></i>
                <a href="{{ route('instructor.courses.students', $course) }}">Regresar</a>

                <div class="md:flex md:gap-6 mt-5">
                    {{-- FOTO DE PERFIL --}}
                    <div class="md:w-1/3">
                        <div class="px-5 py-5 bg-white sm:p-5 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="">
                                <div class="mt-2">
                                    <img src="{{ $student->profile_photo_url }}" alt="{{ $student->name }}"
                                        class="h-90 w-90 rounded-md">

                                </div>

                                <div class="mt-5">
                                    @livewire('instructor.students-details', ['student' => $student, 'course' => $course], key('course' . $course))
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- INFORMACIÓN DEL PERFIL --}}
                    <div class="md:w-2/3">
                        <div class="flex justify-between mb-5">
                            <div>
                                <h2 class="text-2xl font-medium text-gray-900">INFORMACION DEL PERFIL</h2>
                                <p class="mt-1 text-sm text-gray-600">
                                    Toda la información es proporcionada por el mismo usuario y solo el mismo o un
                                    administrador autorizado puede modificarla.
                                </p>
                            </div>
                            <div class="px-4 sm:px-0">
                                <!-- Agrega aquí cualquier otro contenido que desees mostrar en la parte derecha -->
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Nombre:
                            </label>
                            <input disabled
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="name" type="text" value="{{ $student->name }}">
                        </div>

                        <!-- EMAIL -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Correo:
                            </label>
                            <input disabled
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="email" type="email" value="{{ $student->email }}">
                        </div>

                        <!-- TELEFONO -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Telefono:
                            </label>
                            <input disabled
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="phone" type="text" value="{{ $student->phone }}">
                        </div>

                        <!-- INGRESO A LA PLATAFORMA -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Fecha de ingreso a la plataforma:
                            </label>
                            @php
                                $date_user = $student->created_at;
                                Carbon::setLocale('es');
                                $carbonDate = Carbon::parse($date_user);
                                $dayOfWeek = $carbonDate->isoFormat('dddd', 'L'); // Día de la semana en español (ejemplo: Lunes)
                                $month = $carbonDate->isoFormat('MMMM', 'L'); // Mes en texto en español (ejemplo: Julio)
                                $year = $carbonDate->isoFormat('YYYY'); // Año (ejemplo: 2023)
                            @endphp
                            <input disabled
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="phone" type="text"
                                value="{{ $dayOfWeek }}, {{ $carbonDate->day }} de {{ $month }} de {{ $year }}">
                        </div>

                        <!-- INGRESO AL CURSO -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Fecha de ingreso al curso:
                            </label>
                            @php
                                $date = DB::table('course_user')
                                    ->where('user_id', $student->id)
                                    ->value('created_at'); // Obtener directamente el valor del campo enrolled_at
                                Carbon::setLocale('es');
                                $carbonDate = Carbon::parse($date);
                                $dayOfWeek = $carbonDate->isoFormat('dddd', 'L'); // Día de la semana en español (ejemplo: Lunes)
                                $month = $carbonDate->isoFormat('MMMM', 'L'); // Mes en texto en español (ejemplo: Julio)
                                $year = $carbonDate->isoFormat('YYYY'); // Año (ejemplo: 2023)
                            @endphp

                            <input disabled
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="phone" type="text"
                                value="{{ $dayOfWeek }}, {{ $carbonDate->day }} de {{ $month }} de {{ $year }}">
                        </div>

                        <!-- FECHA DE TERMINO DEL CURSO -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Fecha de termino del curso:
                            </label>
                            @php
                                $date = DB::table('course_user')
                                    ->where('user_id', $student->id)
                                    ->value('created_at'); // Obtener directamente el valor del campo enrolled_at
                                Carbon::setLocale('es');
                                $carbonDate = Carbon::parse($date);
                                $dayOfWeek = $carbonDate->isoFormat('dddd', 'L'); // Día de la semana en español (ejemplo: Lunes)
                                $month = $carbonDate->isoFormat('MMMM', 'L'); // Mes en texto en español (ejemplo: Julio)
                                $year = $carbonDate->isoFormat('YYYY'); // Año (ejemplo: 2023)
                            @endphp

                            <input disabled
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="phone" type="text"
                                value="{{ $dayOfWeek }}, {{ $carbonDate->day }} de {{ $month }} de {{ $year }}">
                        </div>
                        <!-- FECHA DE TERMINO DEL CURSO -->

                        <hr class="my-2">

                        <!-- Tabla de revisión de actividades -->
                        <div class="mt-5">
                            <h2 class="text-2xl text-gray-600 font-bold mt-4">
                                REVISION DE ACTIVIDADES
                            </h2>


                            <hr class="my-2">

                            <div class="mt-5">
                                @livewire('instructor.estudent-lesson', ['student' => $student, 'course' => $course], key('course' . $course))
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@else
    <p>No se encontraron datos del estudiante.</p>
    @endif
    </div>
</x-app-layout>
