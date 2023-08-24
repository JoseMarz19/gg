@extends('adminlte::page')

@section('title', 'Cursos CENEC')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')

        @if (session('info'))

            <div class="alert alert-success" role="alert">
                <strong>¡Éxito!</strong> {{session('info')}}
            </div>



        @endif



    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-block btn-outline-warning btn-flat" onclick="window.location='{{ route('admin.roles.create') }}'">
                CREAR ROL </button>
        </div>
        <div class="card-body">
            <table class="table table-striped bg-cyan">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($roles as $role)
                        <tr class="bg-white">
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a class="btn btn-info" href="{{route('admin.roles.edit', $role)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                @method('delete')

                                @csrf

                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ningún rol registrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop