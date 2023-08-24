<div>
    <div class="container bg-blue-600 rounded-xl" wire:click="downloader">
        <i class="fas fa-folder-minus text-white mr-2 cursor-pointer mt-3 ml-3 mb-3
   "> CARPETA DE EVIDENCIAS</i>
    </div>
    <br>
    {{-- BARRA DE PROGRESO --}}
    <div class="relative pt-1">
        <h2 class="text-2xl font-medium text-gray-900">PROGRESO DEL CURSO</h2>
        <div class="flex mb-2 items-center justify-between">
            <div>
                <span
                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200 mt-2 ml-4">
                    COMPLETADO
                </span>
            </div>
            <div class="text-right">
                <span class="text-xs font-semibold inline-block text-blue-600 mt-2 mr-4">
                    {{ $this->advance . '%' }}
                </span>
            </div>
        </div>
        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200 ml-2 mr-2">
            <div style="width:{{ $this->advance . '%' }}"
                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500">
            </div>
        </div>
    </div>
    {{-- BARRA DE PROGRESO --}}
</div>
