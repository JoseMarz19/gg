@extends('adminlte::page')

@section('title', 'Cursos CENEC')

@section('content_header')
    <h1>Observaciones del curso: <strong>{{$course->title}}</strong></h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
        {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
        <div class="form-group">

                    {!! Form::label('body', 'Observaciones del curso') !!}
                    {!! Form::textarea('body', null) !!}

                    @error('body')
                        <strong class="text-danger">Es necesario agregar una observacion...</strong>
                    @enderror
        </div>

        {!! Form::submit('Rechazar el curso', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop