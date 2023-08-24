<div class=" flex flex-col justify-center">
    <div class="relative p-1 w-full sm:max-w-2xl sm:mx-auto">
        <div class="overflow-hidden z-0 rounded-full relative p-1">
            <form role="form" class="relative flex z-50 rounded-full" autocomplete="off">
                    <input wire:model="search" type="text" placeholder="¿No encuentras tu curso?, buscalo aqui"
                    class="rounded-full flex-1 px-6 py-2 text-gray-700 focus:outline-none" />
                <button
                    class="bg-indigo-500 text-white rounded-full font-semibold px-8 py-2 hover:bg-indigo-400 focus:bg-indigo-600 focus:outline-none">BUSCAR</button>
                    

            </form>
           
           

            <div
                class="glow glow-1 z-10 animate-glow1 bg-pink-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute">
            </div>
            <div
                class="glow glow-2 z-20 animate-glow2 bg-purple-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute">
            </div>
            <div
                class="glow glow-3 z-30 animate-glow3 bg-yellow-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute">
            </div>
            <div
                class="glow glow-4 z-40 animate-glow4 bg-blue-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute">
            </div>
        </div>
        
        @if($search)
        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
            @forelse ($this->results as $result)
            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-orange-400">
            <a href="{{route('courses.show', $result)}}">{{$result->title}}</a>
            </li>
            @empty
            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-orange-400">
                No hay ninguna conincidencia :(
                </li>
           
            @endforelse
        </ul>

@endif



    </div>
</div>
