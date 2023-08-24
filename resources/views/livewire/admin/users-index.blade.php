<div>
    <div class="card">

        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre...">
        </div>

        
        

     
        @if ($users->count())
            
        

            <div class="card-body">
                <table class="w-full table table-striped">
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 border">{{$user->id}}</td>
                                <td class="px-4 py-3 border"> 
                                    
                                    {{$user->name}}</td>
                                <td class="px-4 py-3 border">{{$user->email}}</td>
                                <td width="10px" class="px-4 py-3 border">
                                    <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="card-footer">
                {{$users->links()}}
            </div>

        
        @else
            <div class="card-body">
                <strong>No hay registros ...</strong>
            </div>

        @endif

    </div>
</div>
