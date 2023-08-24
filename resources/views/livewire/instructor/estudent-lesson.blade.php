@php
    $resourcelessons = DB::table('studentsresources')
        ->where('user_id', $student->id)
        ->where('course_id', $course->id)
        ->get(); // Obtener directamente el valor del campo enrolled_at

@endphp

<div class="container">
    <table class="w-full">
        <thead>
            <tr class="text-md font-semibold tracking-wide text-center text-gray-900 uppercase border-b bg-blue-300">
                <th class="px-4 py-1">Descargar</th>
                <th class="px-4 py-1">Leccion</th>
                <th class="px-4 py-1">Accion</th>
                <th class="px-4 py-1">Estatus</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($resourcelessons as $resourcelesson)
                @php
                    $namelessons = DB::table('lessons')
                        ->where('id', $resourcelesson->lesson_id)
                        ->get();
                @endphp
                <tr class="text-gray-700 text-center">
                    <td>
                        <div class="flex items-center text-gray-600 cursor-pointer"
                            wire:click="download('{{ $resourcelesson->url }}')">
                            <i class="fas fa-download text-lg text-blue-500"></i>
                            <p class="text-sm ml-2">Descargar archivo de la lección</p>
                        </div>
                    </td>
                    <td class="px-4 py-2 border">
                        @foreach ($namelessons as $namelesson)
                            {{ $namelesson->name }}
                        @endforeach
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center space-x-2">
                            <input type="radio" id="radio{{ $resourcelesson->id }}_1"
                                name="radio{{ $resourcelesson->id }}" class="cursor-pointer"
                                wire:click="updateStatus({{ $resourcelesson->id }}, 1, {{$student}})"
                                {{ $resourcelesson->checked == 1 ? 'checked' : '' }}>
                            <label for="radio{{ $resourcelesson->id }}_1" class="cursor-pointer">Sin Revisar</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="radio" id="radio{{ $resourcelesson->id }}_2"
                                name="radio{{ $resourcelesson->id }}" class="cursor-pointer"
                                wire:click="updateStatus({{ $resourcelesson->id }}, 2, {{$student}})"
                                {{ $resourcelesson->checked == 2 ? 'checked' : '' }}>
                            <label for="radio{{ $resourcelesson->id }}_2" class="cursor-pointer">No Cumple</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="radio" id="radio{{ $resourcelesson->id }}_3"
                            name="radio{{ $resourcelesson->id }}" class="cursor-pointer"
                            wire:click="updateStatus({{ $resourcelesson->id }}, 3, {{$student->id}})"
                            {{ $resourcelesson->checked == 3 ? 'checked' : '' }}>
                        <label for="radio{{ $resourcelesson->id }}_3" class="cursor-pointer">Si Cumple</label>
                        </div>
                    </td>
                    <td class="px-4 py-2 border">
                        @if ($resourcelesson->checked == 1)
                            Sin revisar
                        @elseif ($resourcelesson->checked == 2)
                            No cumple
                        @elseif ($resourcelesson->checked == 3)
                            Si cumple
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
