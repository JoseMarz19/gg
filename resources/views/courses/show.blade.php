<x-app-layout>
    <section class="bg-fuchsia-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>

                <img class="h-60 w-full object-cover " src="{{ Storage::url($course->image->url) }}" alt="">
            </figure>

            <div class="text-white">
                <h1 class="text-4xl text-white">{{ $course->title }}</h1>
                <h1 class="text-xl mb-3 text-white">{{ $course->subtitle }}</h1>
                <p class="mb-3"><i class="fas fa-chart-line text-green-300"> </i> {{ $course->level->name }}</p>
                <p class="mb-3"><i class="fas fa-folder-minus text-yellow-300"> </i> Categoria:
                    {{ $course->category->name }}</p>
                <p class="mb-3"><i class="fas fa-users text-light-blue-400 br-1"> </i> Matriculados:
                    {{ $course->students_count }}</p>
                <p><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"> </i> Calificacion:
                    {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2 ">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i
                                    class="fas fa-check-circle text-green-500 mr-2"></i>{{ $goal->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-fold text-3xl mb-2">Temario</h1>
                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow"
                        @if ($loop->first) x-data="{open : true}"
                    @else
                    x-data="{open : false}" @endif>
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200"
                            x-on:click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i
                                            class="fas fa-edit mr-2 text-yellow-400"></i>{{ $lesson->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
            </section>


            <section class="mb-8">
                <h1 class="font-bold text-3xl text-gray-800">Requisitos</h1>
                <ul>
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base"><i class="fas fa-arrow-circle-right text-green-500 mr-2">
                            </i> {{ $requirement->name }}</li>
                    @endforeach
                </ul>
            </section>

            <section>
                <h1 class="font-bold text-3xl text-gray-800">Decripcion</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>

            @livewire('courses-reviews', ['course' => $course])

        </div>
        <div class="order-1 lg:order-2">


            <section class="card mb-4">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-500 text-lg">Prof.{{ $course->teacher->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold"
                                href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>


                    @can('enrolled', $course)
                        <br>
                        <a class="btn btn-danger btn-block mt-4" href="{{ route('courses.status', $course) }}">Continuar
                            con el curso</a>
                    @else
                        <br>

                        @if ($course->price->value == 0)
                        <div class="flex justify-center">
                            <p class="text-2xl text-green-500 font-bold">-> GRATIS <-</p>
                        </div>
                        <form action="{{ route('courses.enrolled', $course) }}" method="post">
                            @csrf
                            <div class="flex justify-center">
                                <button class="btn btn-danger btn-block" type=""><i class="fa fa-check" aria-hidden="true"></i></i> Llevar curso</button>
                            </div>
                        </form>
                        @else
                            <div class="flex justify-center">
                                <p class="text-2xl text-orange-500 font-bold">MXN ${{ $course->price->value }}</p>
                            </div>

                                @csrf
                                <div class="flex justify-center">
                                    <a href="{{route('payment.checkout', $course)}}" class="btn btn-danger btn-block""><i class="fa fa-shopping-cart"
                                            aria-hidden="true"></i> -> Comprar este curso</a>
                                </div>

                        @endif


                    @endcan
                </div>
            </section>




            <aside class="hidden lg:block">

                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}"
                            alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3"
                                    href="{{ route('courses.show', $similar) }}">{{ Str::limit($similar->title), 40 }}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                    src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{ $similar->teacher->name }}</p>
                            </div>
                            <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"> {{ $similar->rating }}</i>
                            </p>
                        </div>
                    </article>
                @endforeach
            </aside>

        </div>

    </div>
</x-app-layout>
