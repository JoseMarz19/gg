<x-app-layout>
    <section class='bg-cover' style="background-image: url({{asset('img/cursos/portada.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            
            <div class="w-full md:w-3-/4 lg:w-1/2"> 
                <h1 class="text-white fond-bold text-5xl"> Busca, selecciona e ingresa a uno de muchos cursos de CENEC </h1>
                <p class="text-white text-lg mt-2">¡Aqui encontraras todo nuestro catalago de cursos que tenemos disponibles para Ti!</p>
             

                {{-- Esta es la barra SEARCH --}}
                @livewire('search')

                {{-- Aqui acaba el SEARCH --}}
            </div>

        </div>

    </section>


    @livewire('courses-index')

</x-app-layout>