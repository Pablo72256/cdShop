@extends('layouts.app')

@section('content')

    @if (isset($usuarioEditado))
        @if ($usuarioEditado == "Usuario modificado")
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cuenta modificada correctamente</strong>, en breves recibiras un email en tu cuenta con los cambios.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error modificar la cuenta</strong>, por favor vuelva a intentarlo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
    @endif

    <h1 class="text-center">Bienvenido a CDShop</h1>
    <hr/>
    <div class="row pt-2 d-flex justify-content-center">

            <div class="card col-12 col-sm-7 col-lg-3 m-3">
                <img class="card-img-top" src="{{URL::asset('img/inicio/inicioCDs.jpg')}}" alt="imagen_tarjeta">
                <div class="card-body">
                    <h5 class="card-title"><u>CD´s</u></h5>
                    <p class="card-text">Dentro de nuestra propia web podras acceder a un amplio catalogo para adquirir los CD´s que más te gusten, además podrás encontrar colecciones de los mejores éxitos y por supuesto una gran variada de vinilos, que desearás tener en tu casa.</p>
                    <div class="text-center">
                        <a href="{{ url('/articulos') }}" class="btn btn-outline-primary">Catálogo de CD´s</a>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-sm-7 col-lg-3 m-3">
                <div class="card-body">
                    <h5 class="card-title"><u>Historia</u></h5>
                    <p class="card-text">En 1947 comenzamos nuestra andadura en la zona de la Palomera con una pequeña tienda de vinilos que año tras año y gracias a un trato diferenciado hacia nuestros clientes ha ido creciendo y se ha podido convertir en la tienda que todo gran amante de la música quiere tener en su ciudad.</p>
                    <div class="text-center">
                        <a href="{{ route('nosotros') }}" class="btn btn-outline-primary">Nuestra historia</a>
                    </div>

                </div>
                <img class="card-img-bottom" src="{{URL::asset('img/inicio/inicioColecion.jpg')}}" alt="imagen_tarjeta">
            </div>
            <div class="card col-12 col-sm-7 col-lg-3 m-3">
                <img class="card-img-top" src="{{URL::asset('img/inicio/inicioVinilos.jpg')}}" alt="imagen_tarjeta">
                <div class="card-body">
                    <h5 class="card-title"><u>Contáctanos</u></h5>
                    <p class="card-text">Dentro de nuestra web podras acceder a un amplio catalogo para adquirir el CD que más te guste para poder adquirirlo en el momento y elegir si quieres que te lo lleven a casa, si no estremos encantados de que vengas a recoger tu pedido a nuestra tienda, donde además te resolveremos cualquier duda.</p>
                    <div class="text-center">
                        <a href="{{ route('contacto') }}" class="btn btn-outline-primary">Contáctanos</a>
                    </div>
                </div>
        </div>
        <hr class="mt-4"/>
    </div>


@endsection
