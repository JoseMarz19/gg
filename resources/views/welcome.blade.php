<x-app-layout>

{{-- TITULO Y BARRA DE BUSQUEDA --}}
    <section class='bg-cover' style="background-image: url({{asset('img/home/prueba.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">

            <div class="w-full md:w-3-/4 lg:w-1/2">
                <h1 class="text-white fond-bold text-5xl"> Aprende, realiza y certificate con nosotros CENEC </h1>
                <p class="text-white text-lg mt-2">A traves de diferentes cursos, puedes obtener tu certificado avalado por la SEP</p>
                <p class="text-white text-lg mt-2">En mas de un estandar</p>

                {{-- Esta es la barra SEARCH --}}
                @livewire('search')
                {{-- Aqui acaba el SEARCH --}}
            </div>

        </div>

    </section>
{{-- AQUI TERMINA --}}

<section class="mt-24">
    <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/masaje.jpg')}}" alt="">
            </figure>
            <header class="mt-2">

                <h1 class="text-center text-xl text-gray-700"> EC0900</h1>
                <h1 class="text-center text-xl text-gray-700">Aplicacion del Masaje Holistico</h1>
            </header>
            <p class="text-sm text-gray-500">El EC describe el desempeño del terapeuta desde el acondicionamiento de su área de trabajo, insumos y materiales, hasta la aplicación propia de la técnica de masaje holístico . </p>

        </article>

        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover"  src="{{asset('img/home/aromaterapia.jpg')}}" alt="">
            </figure>
            <header class="mt-2">

                <h1 class="text-center text-xl text-gray-700"> EC0301</h1>
                <h1 class="text-center text-xl text-gray-700">Diseño de Cursos</h1>
            </header>
            <p class="text-sm text-gray-500">Es referente a todas las actividades que la persona lleva a cabo durante el diseño de cursos de Formación del capital Humano, diseñan cursos de capacitación presenciales, elaborando la carta descriptiva. </p>
        </article>

        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover"  src="{{asset('img/home/liderazgo.jpg')}}" alt="">
            </figure>
            <header class="mt-2">

                <h1 class="text-center text-xl text-gray-1000"> EC0217</h1>
                <h1 class="text-center text-xl text-gray-700">Impartición de Cursos Presencial Grupal</h1>
            </header>
            <p class="text-sm text-gray-500">El estándar de competencia Impartición de cursos de formación del capital humano de manera presencial y grupal contempla las funciones sustantivas de preparar, conducir y evaluar cursos de capacitación. </p>
        </article>

        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover"  src="{{asset('img/home/excel.jpg')}}" alt="">
            </figure>
            <header class="mt-2">

                <h1 class="text-center text-xl text-gray-700"> EC0366</h1>
                <h1 class="text-center text-xl text-gray-700">Desarrollador de Cursos en línea</h1>
            </header>
            <p class="text-sm text-gray-500">Contempla las competencias que un desarrollador de cursos para formación en línea emplea en la planificación del desarrollo de un curso de formación en línea, la elaboración de contenidos y verificación del funcionamiento de éste. </p>
        </article>

    </div>
</section>

<section class="mt-24 bg-gray-700 py-12">
    <h1 class="text-center text-white text-3xl">¿No sabes qué curso llevar?</h1>
    <p class="text-center text-white">Dirigite al catálogo de cursos y filtrados por categoria o nivel</p>


   <div class="flex justify-center mt-4">
        <a href="{{route('courses.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Cátalogo de cursos
        </a>
    </div>
</section>

<section class="mt-24">
    <h1 class="text-center text-gray-600 text-3xl"> Últimos Estandares de Competencia</h1>
    <p class="text-center text-gray-500 text-sm mb-6">Trabajando Duro para seguir subiendo Estandares de Competencia
    </p>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
        <x-course-card :course="$course" />
        @endforeach
    </div>
</section>

<section class="mt-24">
    <div class="bg-gray-700 shadow">
        <!-- Sección de términos y condiciones -->
        <div class="mt-40 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white">Términos y Condiciones</h1>
                <a href="https://cenec.shop/index.php/politica-de-compra-terminos-y-condiciones/"
                    class="text-white underline mt-4" target="_blank">
                    Términos y condiciones cenec
                </a>
            </div>

            <div class="flex items-center justify-center ">
                <a href="{{ route('home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="59.96"
                        height="49.476" viewBox="0 0 900 900">
                        <image id="Capa_1" data-name="Capa 1" width="900" height="900"
                            xlink:href="data:img/png;base64,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" />
                    </svg>
                </a>
            </div>

            <!-- Agregar iconos -->
            <script src="https://kit.fontawesome.com/YOUR_KIT_ID.js" crossorigin="anonymous"></script>

            <!-- Dentro de tu contenido -->
            <div class="flex flex-col items-center mt-4">
                <h1 class="text-2xl font-bold text-white mb-2">Contáctanos</h1>
                <div class="flex justify-center space-x-4">
                    <a href="https://www.facebook.com/cenecmexico" class="text-blue-600 " target="_blank" >
                        <i class="fab fa-facebook-f text-blue-600 text-xl"></i> <!-- Icono de Facebook en color azul -->
                    </a>
                    <a href="https://www.youtube.com/@cenecmexico" class="text-red-600" Target="_blank">
                        <i class="fab fa-youtube text-red-600 text-xl"></i> <!-- Icono de YouTube en color rojo -->
                    </a>
                    <a href="https://www.tiktok.com/@cenecmexico" class="text-black" Target="_blank">
                        <i class="fab fa-tiktok text-black text-xl"></i> <!-- Icono de TikTok en color negro -->
                    </a>
                    <a href="https://www.instagram.com/cenec_mex/" class="text-pink-600" Target="_blank">
                        <i class="fab fa-instagram text-pink-600 text-xl"></i> <!-- Icono de Instagram en color rosa -->
                    </a>
                </div>

            </div>



        </div>

    </div>

</section>
</x-app-layout>


{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto bg-gray-100">
                        <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="#FF2D20"/>
                    </svg>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a href="https://laravel.com/docs" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Documentation</h2>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://laracasts.com" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Laracasts</h2>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://laravel-news.com" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Laravel News</h2>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <div class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Vibrant Ecosystem</h2>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Forge</a>, <a href="https://vapor.laravel.com" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Vapor</a>, <a href="https://nova.laravel.com" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Nova</a>, and <a href="https://envoyer.io" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Telescope</a>, and more.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 group-hover:stroke-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
 --}}
