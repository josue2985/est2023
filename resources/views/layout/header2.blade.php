<div class="navbar d-flex flex-column align-items-center align-items-sm-start pt-0 px-3 text-white min-vh-100">
    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <picture>
            <source srcset="{{asset('img/logo-estilo.webp')}}" type="image/webp">
            <source srcset="{{asset('img/fallback/logo-estilo.png')}}" type="image/jpeg">
            <img src="{{asset('img/fallback/logo-estilo.png')}}" class="img-fluid logo-estilo" width="100px">
        </picture>
    </a>
    <ul class="flex-column mb-sm-auto nav nav-pills" id="menu">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link align-middle px-0 active">
                <i class="bi-calendar4"></i>
            </a>
        </li>

        <li>
            <a href="{{route('inscritos')}}" class="nav-link px-0 align-middle">
                <i class="bi-people"></i> </a>
        </li>

    </ul>
    <div class="logout w-100">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link px-0 align-middle">
                    <i class="bi-box-arrow-right"></i> </a>
            </li>
        </ul>
    </div>
</div>
