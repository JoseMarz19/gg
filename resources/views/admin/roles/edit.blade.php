@extends('adminlte::page')

@section('title', 'Cursos CENEC')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body bg-cyan">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}
            

            @include('admin.roles.partials.form')

                {!! Form::submit('Actualizar Role', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop