@extends('layouts.app')

@section('content')
    <h1 class="text-center">Sobre Nosotros</h1>
    <hr/>

    <div class="row pt-4">
        <div class="col d-flex">
            <div class="card" style="width: 35%;">
                <img class="card-img-top" src="{{URL::asset('img/nosotros/nosotrosVinilo.jpg')}}" alt="imagen_tarjeta">
            </div>
            <div class="mx-4 card" style="width: 65%;">
                <div class="card-body">
                    <h5 class="card-title">BookShop</h5>
                    <h6 class="card-subtitle mb-2 text-muted">A lo largo de 75 años en León</h6>
                    <p class="card-text pt-3">En 1947 comenzamos nuestra andadura en la zona de la Palomera con una pequeña tienda única en su sector que albergaba los mejores éxitos de todos los tiempos y que los podía llevar a todo el que se acercara a visitarnos con las ganas y la pasión que nos hace sentir y disfrutar la música.</p>
                    <p class="card-text pt-3">Con el paso del tiempo, año tras año, la tienda fué adaptándose a los nuevos tiempos incorporando los CD y añadiendo las nuevas colecciones que iban saliendo, pero siempre manteniendo aquella esencia que nos caracterizaba continuando con los vinilos.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col d-flex">
            <div class="card" style="width: 65%;">
                <div class="card-body">
                    <h5 class="card-title">Generaciones</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Con la tercera generación de libreros</h6>
                    <p class="card-text pt-3">A día de hoy el nieto de Juan Riuz Labrada, quien inició todo esto, es quien lleva la tienda a día de hoy, sin embargo la cuarta generación está en camino y os la podreis encontrar en algunas ocasiones atendiendo.</p>
                    <p class="card-text pt-3">Manteniendo la filosofía desde el inicio, aquella que nos ha llevado a crecer de forma constante y sólida todo este tiempo. Somos una tienda no solo virtual sino que también una tienda física y con trato personalizado y especializado, por lo que como siempre estamos abiertos a consultas y sugerencias</p>
                </div>
            </div>
            <div class="mx-4 card" style="width: 35%;">
                <img class="card-img-top" src="{{URL::asset('img/nosotros/nosotrosCD.jpg')}}" alt="imagen_tarjeta2">
            </div>

        </div>
    </div>

@endsection
