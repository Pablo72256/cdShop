@extends('layouts.app')
@section('content')
    <h1>Lo sentimos, no hay stock suficiente.</h1>
    <hr/>
    <h3>Falta stock al producto {{ $errorStock }}, reduzca la cantidad o elimine el artículo si desea continuar comprando.</h3>
    <br/>
    <h2> <a class="btn btn-secondary" href="{{ route('carrito') }}">Volver al carrito</a> </h2>   
@endsection
