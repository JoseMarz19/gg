<x-app-layout>


    {{-- MERCADO PAGO PHP --}}
    @php
    // SDK de Mercado Pago
    require base_path('/vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    // Crea un ítem en la preferencia

            $item = new MercadoPago\Item();
            $item->title = $course->title;
            $item->quantity = 1;
            $item->unit_price = $course->price->value;
            

            

$preference->back_urls = array(
    
    "success" => route('payment.show', $course),
    /* "success" => route('payment.paymercado', $course), */
    "failure" => "http://www.tu-sitio/failure",
    "pending" => "http://www.tu-sitio/pending"
);

$preference->auto_return = "approved";
// ...       
    
    $preference->items = array($item);
    $preference->save();
    @endphp
    {{-- MERCADO PAGO PHP --}}


    <div class="max-w-axl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>
        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-32 w-42 object-cover" src="{{ Storage::url($course->image->url) }}">
                    <div class="ml-2">
                        <h1 class="text-lg">{{ $course->title }}</h1>
                        <h1 class="text-lg">{{ $course->description }}</h1>
                        <h1 class="text-lg text-green-500"><i class="fas fa-chart-line" aria-hidden="true"></i> Nivel:
                            {{ $course->level->name }}</h1>
                        <h1 class="text-lg text-yellow-500"><i class="fas fa-folder-minus " aria-hidden="true"></i>
                            Categoria: {{ $course->category->name }}</h1>
                        <h1 class="text-lg text-blue-500">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            Lecciones: {{ $course->sections->count() }} Lecciones
                        </h1>
                        <h1 class="text-lg text-yellow-500"><i
                                class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"> </i>
                            Calificacion:
                            {{ $course->rating }}</h1>
                        <h1 class="text-lg text-blue-500"><i class="fa fa-users" aria-hidden="true"></i> Matriculados:
                            {{ $course->students_count }}</h1>
                    </div>
                    <p class="text-2xl font-bold text-green-600 ml-auto">MXN ${{ $course->price->value }}</p>
                </article>
                <article class="flex items-center">
                    <img class="h-22 w-22 object-cover rounded-md shadow-lg"
                        src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                    <div class="ml-2">
                        <h1 class="text-lg">Curso realizado y diseñado por:</h1>
                        <h1 class="text-lg text-blue-500"><i class="fa fa-user" aria-hidden="true"></i> Profesor:
                            {{ $course->teacher->name }}</h1>
                    </div>
                </article>
            </div>
            <hr>
            {{-- <div class="flex flex-auto justify-center mt-2 mb-4">
                <a href="{{route('payment.pay', $course)}}" class="btn button-compra btn-block"><i class="fa fa-shopping-cart"
                        aria-hidden="true"></i> Comprar</a>
            </div>   --}}
            <style>
                .orange-background {
                    background-color: orange;

                    .icon-space {
                        margin: 0 10px;/
                    }
            </style>
            <div class="orange-background">
                <br>
                <h1 class="text-center text-3xl font-bold text-white">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <span class="icon-space">FORMAS DE PAGO</span>
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                </h1>
                <br>
            </div>
            {{-- BOTON DE MERCADO PAGO --}}
            <div class="card-body">
                <h1 class="text-center text-2xl font-bold">MERCADO PAGO</h1>
                <div class="flex justify-center">
                    <a id="wallet_container"></a>
                </div>
            </div>

            {{-- BOTON DE MERCADO PAGO --}}
            {{-- BOTON DE PAYPAL --}}
             <div class="card-body">
                <h1 class="text-center text-2xl font-bold">PAYPAL</h1>
                <div class="flex justify-center mt-2">
<a href="{{route('payment.pay', $course)}}" class="myButton0a"><span class="paypal1">Pay</span><span class="paypal2">Pal</span><span class="paypal3">.me</span></a>
                </div>
            </div>
            <hr>

            {{-- BOTON DE PAYPAL --}}



            <div class="card-body">
                <div class="flex flex-auto justify-center mt-2 mb-4">
                    <p class="text-sm mt-4">©2023 Centro Nacional de Evaluación de Competencias. Todos los derechos
                        reservados por Pabeaxxa S. de R. L. de C. V. Aviso de Privacidad.</p>
                </div>
                <div class="flex flex-auto justify-center mt-2 mb-4">
                    <a class="text-red-500 font-bold" href="">TERMINOS Y CONDICIONES</a>
                </div>
            </div>
        </div>
    </div>

    

    {{-- SDK MercadoPago.js MERCADO PAGO --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        //Agrega credenciales de SDK
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}");
        const bricksBuilder = mp.bricks();
        //Inicializa el checkout
        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: "{{ $preference->id }}",
                redirectMode: "modal"
            },
             customization: {
      texts: {
          action: 'buy',
          valueProp: 'security_details',
      },
 },
        });
    </script>
    {{-- SDK MercadoPago.js MERCADO PAGO --}}
    {{-- SDK PAYPAL --}}
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}"></script>
    {{-- <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script> --}}
    <script>
        // Renderizar el botón de PayPal en #paypal-button-container
        paypal.Buttons({
            // Configurar la transacción
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: {{ $course->price->value }}      
                        }
                    }]
                });
            },
    
            // Finalizar la transacción
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Mostrar un mensaje de éxito al comprador
                    alert('Transacción completada por ' + details.payer.name.given_name + '!');
                    // Ejecutar el enlace después de 5 segundos
                    setTimeout(function() {
                        window.location.href = "{{ route('payment.approved', $course) }}";
                    }, 5000);
                });
            },
    
            // Cambiar el comportamiento del botón de crédito/débito a la "versión antigua"
            onShippingChange: function(data, actions) {
                // Si no es necesario, no hacer nada...
                return actions.resolve();
            }
        }).render('#paypal-button-container');
    </script>
    
    
    {{-- SDK PAYPAL --}}
</x-app-layout>
