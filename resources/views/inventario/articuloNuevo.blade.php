@extends('layouts.app')
@section('content')
    <h1>Gestión de inventario</h1>
    <hr/>
    <div class="container-fluid px-5">
        <form action="{{ route('inventario.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <legend>Nuevo Artítulo</legend>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="form_foto">Foto</label>
                    <input type="file" name="form_foto" id="form_foto" class="form-control" accept="image/jpg" required/>
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="form_nombre">Nombre</label>
                    <input type="text" name="form_nombre" id="form_nombre" class="form-control" required/>
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="form_artista">Artista</label>
                    <input type="text" name="form_artista" id="form_artista" class="form-control" required/>
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="form_stock">Stock</label>
                    <input type="number" name="form_stock" min="1" step="1" id="form_stock" class="form-control" required/>
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="form_categoria">Categoria</label>
                    <input type="text" name="form_categoria" id="form_categoria" class="form-control" required/>
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="form_precio">Precio</label>
                    <input type="number" name="form_precio" id="form_precio" class="form-control" min="0.01" step="0.01" required/>
                </div>
            </div>
            <div class="row mt-4"> <div class="input-field col-sm-6 text-lg-end">
                <input type="submit" class="btn btn-primary" value="Añadir" /></div>
                <div class="input-field col-sm-6 text-lg-start">
                    <input type="reset" class="btn btn-danger" value="Borrar" />
                </div>
            </div>
        </form>
    </div>
@endsection














