@php use App\Models\Funko; @endphp
@extends('main')
@section('title', 'Update image funko')
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

    <dl class="row">
        <dt class="col-sm-2">ID:</dt>
        <dd class="col-sm-10">{{$funko->id}}</dd>
        <dt class="col-sm-2">Nombre:</dt>
        <dd class="col-sm-10">{{$funko->nombre}}</dd>
        <dt class="col-sm-2">Categoria:</dt>
        <dd class="col-sm-10">{{$funko->categoria}}</dd>
        <dt class="col-sm-2">Precio:</dt>
        <dd class="col-sm-10">{{$funko->precio}}€</dd>
        <dt class="col-sm-2">Cantidad:</dt>
        <dd class="col-sm-10">{{$funko->cantidad}}</dd>
        <dt class="col-sm-2">Imagen:</dt>
        <dd class="col-sm-10">
            @if($funko->imagen != Funko::$IMAGE_DEFAULT)
                <img alt="Imagen del funko" class="img-fluid" src="{{ asset('storage/' . $funko->imagen) }}">
            @else
                <img alt="Imagen por defecto" class="img-fluid" src="{{Funko::$IMAGE_DEFAULT}}">
            @endif
        </dd>
    </dl>

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Editar Imagen del Funko</h1>
            <form action="{{route("funkos.actualizarImagen", $funko->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{route('funkos.index')}}" class="btn btn-danger">Cancelar y volver</a>
            </form>
        </div>

@endsection
