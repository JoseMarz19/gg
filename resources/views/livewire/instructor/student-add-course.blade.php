
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- Enlaces de navegación -->
            <i class="far fa-arrow-alt-circle-left"></i>
            <a href="{{ route('instructor.courses.students', $course) }}">Regresar</a>
            <div class="flex justify-center items-center"s>
        
                <h1 class="text-2xl font-bold mb-4">ESTUDIANTES NO MATRICULADOS AL CURSO</h1>
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
        
        
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-center text-gray-900 uppercase border-b  bg-pink-300">
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Numero</th>
                            <th class="px-4 py-3">Correo</th>
                            <th class="px-4 py-3">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
        
                        @foreach ($students as $student)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">
                                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
        
                                            <img id="picture" class="rounded-full w-full h-full object-cover object-center"
                                                src="{{ $student->profile_photo_url }}">
        
        
        
                                        </div>
        
                                        <div class="ml-4">
        
                                            <div class="text-sm font-semibold text-black">
                                                {{ $student->name }}
                                            </div>
        
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border text-center">
                                    {{ $student->phone }}
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border text-center">
                                    {{ $student->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <label class="inline-flex items-center">
                                        <input wire:model="selected" value="{{ $student->id }}" type="checkbox"
                                            class="form-checkbox h-5 w-5 text-cyan-600">
                                        <span class="ml-2">Seleccionar</span>
                                    </label>
                                </td>
                                {{-- Agrega las opciones aquí --}}
                            </tr>
                        @endforeach
        
        
                    </tbody>
                </table>
        
        
        
        
                @if (count($selected) > 0)
                <div class="flex justify-end mt-4">
                    <button wire:click="enrollSelected" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-4 mr-4">
                   ({{ count($selected) }}) <br>ALUMNO SELECCIONADO
                    </button>
                </div>
            @endif
        
        
        
            </x-table-responsive>
        </div>
        @push('scripts')
            <script>
                Livewire.on('updateSelectedCount', selectedCount => {
                    window.selectedCount = selectedCount;
                });
            </script>
        @endpush
        
