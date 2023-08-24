<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="bg-orange-400 shadow py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-3" wire:click="resetFilters">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los cursos
            </button>

                {{-- Fin Barra de busqueda --}}
                {{-- Inicio de Categorias --}}

                <div class="relative" x-data="{open: false}">
                    <button class="mr-3 px-4 block h-12 text-gray-700 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = !open">
                        <i class="fas fa-tags text-sm mr-2"></i>
                        Categoria
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    {{-- Dropdrown Body --}}
                    <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                        
                        @foreach ($categories as $category)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-700 hover:bg-orange-400 hover:text-white" wire:click="$set('category_id',{{$category->id}})" x-on:click="open = false">{{$category->name}}</a>
                        @endforeach
                        
                        
                    </div>
                    {{-- Fin Dropdrown Body --}}
                </div>
                {{-- Fin DropDown --}}

                {{-- DropDown Niveles--}}
                <div class="relative" x-data="{open: false}">
                    <button class="mr-3 px-4 block h-12 text-gray-700 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = !open">
                        <i class="fas fa-tags text-sm mr-2"></i>
                        Niveles
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    {{-- Dropdrown Body --}}
                    <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                        @foreach ($levels as $level)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-700 hover:bg-orange-400 hover:text-white" wire:click="$set('level_id',{{$level->id}})" x-on:click="open = false">{{$level->name}}</a>
                        @endforeach
                    </div>
                    {{-- Fin Dropdrown Body --}}
                </div>
                {{-- Fin DropDown --}}
                            
            
        </div>
    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
         <x-course-card :course="$course" />
        @endforeach
    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>
</div>
