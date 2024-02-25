@extends('main')

{{--Titulo de la página--}}
@section('title', 'FunkoLandia')

@section('content')
    <div class="row">
        @if(count($funkos)>0)
            @foreach($funkos as $funko)
                <div class="col-md-4 mb-3">
                    <div class="card cards__card">
                        <img src="{{$funko->imagen}}" class="card-img-top" alt="Foto del funko">
                        <div class="card-body">
                            <h5 class="card-title">{{$funko->nombre}} </h5>
                            <span class="badge bg-primary">ID: {{$funko->id}}</span>
                            <p class="card-text">Categoria: {{$funko->categoria}}</p>
                            <p class="card-text">Precio: {{$funko->precio}}€</p>
                            <p class="card-text">Cantidad: {{$funko->cantidad}}</p>
                            <a href="{{url( 'detalles', ['id' => $funko->id ]) }}" class="card__cta cta">Ver
                                más</a>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <a href="{{url( 'eliminar', ['id' => $funko->id ]) }}"
                                       class="btn btn-danger w-100 ">Eliminar</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{url( 'editar', ['id' => $funko->id ]) }}"
                                       class="btn btn-warning w-100">Editar</a>
                                </div>
                            </div>

                            <a href="{{url( 'comprar', ['id' => $funko->id ]) }}"
                               class="card__ctaB btn-primary w-100 ctaB">Comprar</a>

                        </div>


                    </div>
                </div>
            @endforeach

        @else
            <h1>No hay funkos</h1>

        @endif

    </div>
    {{--Paginación de funkos--}}
    {{$funkos->links()}}
    <a href="{{url('crear')}}" class="btn btn-primary">Crear</a>

@endsection



