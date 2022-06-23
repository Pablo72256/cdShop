@extends('layouts.app')

@section('content')

    @if (isset($usuarioEditado))
        @if ($usuarioEditado == "Usuario modificado")
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cuenta modificada correctamente</strong>, en breves recibiras un email en tu cuenta con los cambios.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif ($usuarioEditado == "Contraseñas no coinciden")
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error modificar la cuenta</strong>, la contraseña actual no coincide con la suya.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error modificar la cuenta</strong>, por favor vuelva a intentarlo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
    @endif

    <h1 class="text-center">Quizá te interese...</h1>
    <hr/>

    <?php $contador = 1;?>
    <div class="row pt-2 d-flex justify-content-center">
        @if ($contador <= 8)
            @foreach ($articulos as $articulo)
                <div class="col-8 col-xl-2 col-lg-3 col-md-3 col-sm-4 m-2">
                    <div class="card-img-top d-flex justify-content-center">
                        <img class="w-75" src="<?php $ruta = "img/articulos/{$articulo->foto}.png"; echo $ruta; ?>" alt="caratula">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"><u>{{ $articulo->nombre }}</u></h5>
                        <h6 class="card-title text-center">{{ $articulo->artista }}</h6>
                        <h6 class="card-title text-center">{{ $articulo->precio }}$</h6>
                        <div class="text-center">
                            <a href="{{ url('/articulos') }}" class="btn btn-outline-primary btn-sm">VER</a>
                        </div>
                    </div>
                </div>
                <?php $contador++;?>
            @endforeach
        @endif
    </div>
        <hr class="mt-4"/>
    </div>


@endsection
