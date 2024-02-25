
<nav class="navbar navbar-expand-lg navbar-dark gradient-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('index')}}">FunkoLandia</a>

        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fas fa-bars text-light"></i>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
                <li class="nav-item text-center mx-2 mx-lg-1">
                    <a class="nav-link active" aria-current="page" href="{{url('funkos')}}">

                        Inicio
                    </a>
                </li>
                <li class="nav-item text-center mx-2 mx-lg-1">
                    <a class="nav-link" href="#">
                        Categorias
                    </a>
                </li>
            </ul>
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <div class="container-fluid d-flex justify-content-center align-items-center">
                    <a class="navbar-brand" href="{{url('index')}}">FunkoLandia</a>
                </div>
            </nav>

            <form class="d-flex input-group w-auto ms-lg-3 my-3 my-lg-0" action="{{route('funkos.index')}}" method="get">
                <input id="search" name="search" type="text" class="form-control" placeholder="Buscar" aria-label="Search" />
                <button class="btn btn-outline-primary" type="submit" >
                    Search
                </button>
            </form>
        </div>
    </div>
</nav>

<style>
    .btn {
        padding: .45rem 1.5rem .35rem;
    }

    .gradient-custom {
        background: #9b2a2a;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgb(43, 45, 129), rgb(133, 4, 4));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(43, 45, 129, 1), rgb(134, 7, 7))
    }
</style>
