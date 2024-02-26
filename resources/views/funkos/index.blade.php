@php use App\Models\Funko; @endphp
@extends('main')

{{--Titulo de la página--}}
@section('title', 'FunkoLandia')

@section('content')

    <div class="row">
        @if(count($funkos)>0)
            @foreach($funkos as $funko)
                <div class="col-md-4 mb-3">
                    <div class="card cards__card">
                        @if($funko->imagen != Funko::$IMAGE_DEFAULT)
                            <img src="{{ asset('storage/' . $funko->imagen) }}" class="card-img-top" alt="Imagen">
                        @else
                            <img src="{{Funko::$IMAGE_DEFAULT}}" class="card-img-top" alt="Imagen">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$funko->nombre}} </h5>
                            <span class="badge bg-primary">ID: {{$funko->id}}</span>
                            <p class="card-text">Categoria: {{$funko->categoria}}</p>
                            <p class="card-text">Precio: {{$funko->precio}}€</p>
                            <p class="card-text">Cantidad: {{$funko->cantidad}}</p>
                            <a href="{{route( 'funkos.show', $funko->id )}}" class="card__cta cta">Ver
                                más</a>
                            <div class="row">
                                <div class="col-md-4 ">
                                    <a href="#" data-id="{{$funko->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger ">Eliminar</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route( 'funkos.edit', $funko->id )}}"
                                       class="btn btn-warning ">Editar</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('funkos.editImagen', $funko->id) }}"
                                       class="btn btn-primary ">Imagen</a>
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
    <a href="{{route('funkos.create')}}" class="btn btn-primary">Crear</a>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1"  aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar Funko</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que quieres eliminar este Funko?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('funkos.destroy', $funko->id )  }}" id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger borrarFunko">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.borrarFunko').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#deleteForm').attr('action', '/funkos/' + id);
                $('#deleteModal').modal('show');
            });
        });
    </script>

@endsection



