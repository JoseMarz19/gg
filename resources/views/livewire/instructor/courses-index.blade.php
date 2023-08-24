<div class="container py-8">


    <x-table-responsive>
        {{-- BARRA DE BUSQUEDA --}}
        <div class="overflow-hidden z-0 rounded-full relative p-1">
            <form role="form" class="relative flex z-50 rounded-full" autocomplete="off">
                <input wire:keydown="limpiar_page" wire:model="search" type="text"
                    placeholder="¿No encuentras tu curso?, buscalo aqui"
                    class="rounded-full flex-1 px-6 py-2 text-gray-700 focus:outline-none" />

                    <a class="text-white bg-gradient-to-br from-green-500 to-lime-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 mt-1" href="{{route("instructor.courses.create")}}">Crear nuevo curso</a>
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

        @if ($courses->count())


            <table class="w-full">
                <thead>
                    <tr
                        class="text-md font-semibold tracking-wide text-center text-gray-900 uppercase border-b  bg-pink-300">
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Matriculado</th>
                        <th class="px-4 py-3">Calificacion</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Opciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($courses as $course)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                        @isset($course->image)
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{ Storage::url($course->image->url) }}" alt=""
                                             >
                                        @else
                                        <img id="picture" class="rounded-full w-full h-full object-cover object-center" src="https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">

                                        @endisset
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>

                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-black">
                                            {{ $course->title }}
                                        </div>
                                        <div class="text-sm  text-gray-500">
                                            {{ $course->category->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-ms font-semibold border text-center">
                                <div>
                                    <p class="text-sm text-gray-900">{{ $course->students->count() }}</p>
                                    <p class="text-xs text-gray-500">Alumnos matriculados</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm border text-center">
                                {{ $course->rating }}
                                <div class="text-center flex items-center">
                                    <ul class="text-sm flex ml-12">
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-xs text-gray-600">
                                    Valoracion del curso
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs border text-center">

                                @switch($course->status)
                                    @case(1)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">
                                            Borrador </span>
                                    @break

                                    @case(2)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                            Revision </span>
                                    @break

                                    @case(3)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                            Publicado </span>
                                    @break

                                    @default
                                @endswitch



                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('instructor.courses.edit', $course) }}" type="button"
                                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    Editar</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>


            <div class="px-6 py-4">
                {{ $courses->links() }}
            </div>
        @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente :(
            </div>

        @endif


    </x-table-responsive>

</div>
