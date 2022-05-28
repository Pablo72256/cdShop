@extends('layouts.app')

@section('content')

    <h1 class="text-center">Cuenta de usuario</h1>
    <hr/>
    <div class="container-fluid px-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-10 col-md-8">
                <form action="{{ route('cuenta.update', ['cuentum'=>"$usuario->id"]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <legend>Modificar cuenta</legend>
                    <div class="row mt-4">
                        <div class="input-field col-sm-12">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? : $usuario->name }}"/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="input-field col-sm-12">
                            <label for="last_name">Apellidos</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') ? : $usuario->last_name }}"/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="input-field col-sm-12">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') ? : $usuario->email }}" disabled/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="input-field col-sm-12">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') ? : $usuario->address }}"/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="input-field col-sm-12">
                            <label for="pay">Método de pago</label>
                            <input type="text" name="pay" id="pay" class="form-control" value="Transbank" disabled/>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex justify-content-end">
                        <a class="btn btn-danger col-5 col-md-3 col-lg-2 me-2" href="{{ url('/articulos') }}">Cancelar</a>
                        <input type="submit" class="btn btn-warning col-5 col-md-3 col-lg-2" value="Modificar" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection