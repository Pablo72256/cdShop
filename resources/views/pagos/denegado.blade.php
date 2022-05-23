@extends('layouts.app')

@section('content')

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error al realizar el pedido</strong>, por favor vuelva a intentarlo.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <h1>Ups! Algo ha ocurrido.</h1>
    <hr/>
    <div class='container-fluid'>
        <h2>Por favor intentelo de nuevo.</h2>
        <h3>Si el error persiste, pruebe con otro método de pago o inténtelo más tarde.</h3>
        <br/>
        <h2> <a class="btn btn-secondary" href="{{ route('carrito') }}">Volver al carrito</a> </h2>
    </div>

@endsection