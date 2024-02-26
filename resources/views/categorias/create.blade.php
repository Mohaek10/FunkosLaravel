@extends('main')
@section('title', 'Create a new categoria')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <h6>Por favor corrige los siguientes errores:</h6>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Crear Categoria</h1>
            <form action="{{route("categorias.store")}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                           required>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
                <a href="{{route('categorias.index')}}" class="btn btn-danger">Cancelar y volver</a>
            </form>
        </div>
@endsection
