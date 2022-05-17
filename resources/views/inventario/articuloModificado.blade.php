@extends('layouts.app')
@section('content')
    <h1>Artículo {{ $operacion }}</h1>
    <hr/>
    <div class='container-fluid'>
        <h2>Artículo {{ $articulo }} {{ $operacion }} correctamente</h2>
        <br/>
        <h2>
            <a href="{{ route('inventario.index') }}">Volver al Inventario</a>
        </h2>
    </div>
@endsection
