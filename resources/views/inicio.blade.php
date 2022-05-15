@extends('layouts.app')

@section('content')
    <h1 class="text-center">Bienvenido a CDShop</h1>
    <hr/>
    <div class="row pt-2">
        <div class="col d-flex justify-content-between">
            <div class="card" style="width: 25%;">
                <img class="card-img-top" src="{{URL::asset('img/inicio/inicioCDs.jpg')}}" alt="imagen_tarjeta">
                <div class="card-body">
                    <h5 class="card-title"><u>CD´s</u></h5>
                    <p class="card-text">Dentro de nuestra web podras acceder a un amplio catalogo para adquirir los CD´s que más te gusten, además podrás encontrar colecciones de los mejores éxitos y por supuesto una gran variada de vinilos, que desearás tener en tu casa.</p>
                    <div class="text-center">
                        <a href="{{ url('/articulos') }}" class="btn btn-outline-primary">Catálogo de CD´s</a>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 25%;">
                <div class="card-body">
                    <h5 class="card-title"><u>Historia</u></h5>
                    <p class="card-text">En 1947 comenzamos nuestra andadura en la zona de la Palomera con una pequeña tienda de vinilos que año tras año y gracias a un trato diferenciado hacia nuestros clientes ha ido creciendo y se ha podido convertir en la tienda que todo gran amante de la música quiere tener en su ciudad.</p>
                    <div class="text-center">
                        <a href="{{ route('nosotros') }}" class="btn btn-outline-primary">Nuestra historia</a>
                    </div>

                </div>
                <img class="card-img-bottom" src="{{URL::asset('img/inicio/inicioColecion.jpg')}}" alt="imagen_tarjeta">
            </div>
            <div class="card" style="width: 25%;">
                <img class="card-img-top" src="{{URL::asset('img/inicio/inicioVinilos.jpg')}}" alt="imagen_tarjeta">
                <div class="card-body">
                    <h5 class="card-title"><u>Contáctanos</u></h5>
                    <p class="card-text">Dentro de nuestra web podras acceder a un amplio catalogo para adquirir el CD que más te guste para poder adquirirlo en el momento y elegir si quieres que te lo lleven a casa, si no estremos encantados de que vengas a recoger tu pedido a nuestra tienda, donde además te resolveremos cualquier duda.</p>
                    <div class="text-center">
                        <a href="{{ route('contacto') }}" class="btn btn-outline-primary">Contáctanos</a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-4"/>
    </div>


@endsection
