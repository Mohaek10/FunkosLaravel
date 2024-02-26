@php use App\Models\Funko; @endphp
@extends('main')
@section('title', 'Details of the funko')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @if($funko->imagen != Funko::$IMAGE_DEFAULT)
                <img src="{{ asset('storage/' . $funko->imagen) }}" class="img-fluid" alt="Imagen">
            @else
                <img src="{{Funko::$IMAGE_DEFAULT}}" class="img-fluid" alt="Imagen">
            @endif
        </div>
        <div class="col-md-8">
            <h2><?php echo htmlspecialchars($funko->nombre) ?></h2>
            <div class="details">
                <p><strong>ID:</strong> <?php echo htmlspecialchars($funko->id); ?></p>
                <p><strong>Categoria:</strong> <?php echo htmlspecialchars($funko->categoria->nombre); ?></p>
                <p><strong>Precio:</strong> <?php echo htmlspecialchars($funko->precio); ?></p>
                <p><strong>Cantidad:</strong> <?php echo htmlspecialchars($funko->cantidad); ?></p>
                <p><strong>Fecha de creación:</strong> <?php echo htmlspecialchars($funko->created_at); ?></p>
                <p><strong>Fecha de actualización:</strong> <?php echo htmlspecialchars($funko->updated_at); ?></p>

            </div>
            <a href="{{route('funkos.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <style>

        .container {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(255, 255, 255);
        }
        html,
        body {
            height: 100%;
            min-height: 100vh;
        }

        body {
            font-family: "League Spartan", system-ui, sans-serif;
            font-size: 1.1rem;
            line-height: 1.2;
            background-color: #212121;
            color: #ddd;
        }

    </style>
@endsection
