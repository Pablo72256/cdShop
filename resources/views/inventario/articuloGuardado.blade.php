@extends('layouts.app')
@section('content')
    <h1>Artículo guardado</h1>
    <hr/>
    <div class='container-fluid'>
        <h2>El artículo {{ $articulo }} se ha guardado correctamente</h2>
        <br/>
        <h2> <a href="{{ route('inventario.index') }}">Volver al Inventario</a> </h2>
    </div>
@endsection
