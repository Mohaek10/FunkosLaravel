@php use App\Models\User; @endphp
@extends('main')

{{--Titulo de la página--}}
@section('title', 'Categorias')

@section('content')

    {{--Listado de categorias y con botones de ver detalles y borrar--}}
    <div class="row">
        @if(count($categorias)>0)
            @foreach($categorias as $categoria)
                <div class="col-md-4 mb-3">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">{{$categoria->nombre}} </h5>
                            <span class="badge bg-primary">ID: {{$categoria->id}}</span>
                            @auth
                                @if(User::isAdmin())
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="#" data-id="{{$categoria->id}}" data-bs-toggle="modal"
                                               data-bs-target="#deleteModal" class="btn btn-danger ">Eliminar</a>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

            @endforeach
        @else
            <h1>No hay categorias</h1>
        @endif
    </div>

    {{--Botón para crear una nueva categoria--}}
    @auth
        @if(User::isAdmin())
            <a href="{{route('categorias.create')}}" class="btn btn-primary">Crear Categoria</a>
        @endif
    @endauth

    {{--Modal para confirmar el borrado de una categoria--}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar Funko</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que quieres eliminar esta categoria?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <form action="{{ route('categorias.destroy', $categoria->id )  }}"
                          id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger borrarFunko">Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.borrarFunko').on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#deleteForm').attr('action', '/funkos/' + id);
                $('#deleteModal').modal('show');
            });
        });
    </script>

    <style>
        .card {
            width: 18rem;
        }
    </style>

@endsection
