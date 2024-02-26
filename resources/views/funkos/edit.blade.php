@extends('main')
@section('title', 'Update a funko')
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
            <h1 class="text-center">Editar Funko</h1>
            <form action="{{route("funkos.update", $funko->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                           required value="{{$funko->nombre}}">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" min="0" id="precio" name="precio"
                            required value="{{$funko->precio}}">
                           required>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" min="0" class="form-control" id="cantidad" name="cantidad"
                            required value="{{$funko->cantidad}}">
                           required>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" id="categoria" name="categoria">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}"
                                    @if($categoria->id == $funko->categoria_id) selected @endif>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{route('funkos.index')}}" class="btn btn-danger">Cancelar y volver</a>
            </form>
        </div>
    </div>

@endsection
