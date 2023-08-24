@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cursos Matriculados</h1>
        @if (!empty($enrolledCourses))
            @foreach ($enrolledCourses as $course)
                <div>
                    <h3>
                        <a href="{{ route('courses.status', $course->id) }}">{{ $course->title }}</a>
                    </h3>
                    Curso
                </div>
            @endforeach
        @else
            <p>No tienes cursos matriculados.</p>
        @endif
    </div>
@endsection
