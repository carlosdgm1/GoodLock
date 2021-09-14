<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom" style="background-color: white">
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="{{asset('img/logo.png')}}" lass="bi me-2" width="50" height="42">
        <span class="fs-7">Apartado administracion</span>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Opciones
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('index-administracionP')}}">Crear personal</a></li>
                <li><a class="dropdown-item"href="{{route('index-administracionR')}}">Crear residente</a></li>
            </ul>
            </li>
    </ul>
    </header>
</div>