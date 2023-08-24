@props(['course'])



<article class="card">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
    <div class="card-body flex-1 flex flex-col">
        <h1 class="card-title min-h-16">{{ Str::limit($course->title, 40) }}
        </h1>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Prof: {{ $course->teacher->name }}</p>

        <div class="flex mb-2">
            <ul class="flex text-sm">
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                </li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                {{ $course->students_count }}
            </p>
        </div>

        @if ($course->price->value == 0)
            <div class="flex justify-center">
                <p class="text-green-600 font-bold"><i class="fa fa-arrow-right"></i> GRATIS <i
                        class="fa fa-arrow-left"></i></p>
            </div>
        @else
            <div class="flex justify-center">
                <p class="text-orange-500 font-bold"><i class="fa fa-arrow-right"></i> MXN ${{ $course->price->value }}
                    <i class="fa fa-arrow-left"></i></p>
            </div>
        @endif




        <div class="flex justify-center">
            <a href="{{ route('courses.show', $course) }}" class="btn-block btn-primary  rounded">
                Ver más
            </a>
        </div>
</article>
