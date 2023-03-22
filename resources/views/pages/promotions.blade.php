@extends('layout.layout')
@section('title', 'Promociones')
@section('body')
    <div class="section formularioGrand">
        <div class="container">
            <div class="row">
                <div class="col px-5">
                    <div class="top-container">
                        <picture>
                            <source srcset="{{asset('img/logo-estilo.webp')}}" type="image/webp">
                            <source srcset="{{asset('img/fallback/logo-estilo.png')}}" type="image/jpeg">
                            <img src="{{asset('img/fallback/logo-estilo.png')}}" class="img-fluid logo-estilo" width="100px">
                        </picture>

                        <picture>
                            <source srcset="{{asset('img/dots-header-yellow.webp')}}" type="image/webp">
                            <source srcset="{{asset('img/fallback/dots-header-yellow.png')}}" type="image/jpeg">
                            <img src="{{asset('img/fallback/dots-header-yellow.png')}}" class="yellow-dots img-fluid" width="100px">
                        </picture>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 sombra-no">
                    <div class="card sin-color border-no sombra-no header-picture">
                        <picture>
                            <source srcset="{{asset('img/header-papelesa.webp')}}" type="image/webp">
                            <source srcset="{{asset('img/fallback/header-papelesa.png')}}" type="image/jpeg">
                            <img src="{{asset('img/fallback/header-papelesa.png')}}" class="sombra-no border-no safari-papelesa" alt="...">
                        </picture>
                    </div>
                </div>
                <div class="col-12 col-md-5 formulario-container">
                    <div class="subtitle text-center">
                        <p>
                            Participa en el Megasorteo de <br><span class="txt-bolder fs-1-2">CUADERNO ESTILO</span><br> y podrás ser uno de nuestros <br> <span class="txt-bolder">30 ganadores mensuales</span>
                        </p>
                    </div>
                    <form method="post" name="formPromotions" action="{{route('inscripcion')}}" class="p-4 rounded-4 bg-purple formulario">
                        @csrf
                        <h4 class="text-center">REGISTRA TUS DATOS AQUÍ</h4>
                        <div class="mb-3">
                            <input name="nombre" type="text" class="form-control cajas-texto" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nombre" pattern="[A-Za-zñáéíóúàèìòù ]{1,50}"
                                required>
                        </div>
                        <div class="mb-3">
                            <input name="apellido" placeholder="Apellido" pattern="[A-Za-zñáéíóúàèìòù ]{1,50}" required
                                type="text" class="form-control cajas-texto" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <input name="telefono" placeholder="Teléfono" pattern="[0-9]{10}" required
                                type="text" class="form-control cajas-texto" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <input name="correo" placeholder="Correo electrónico" pattern="{1,100}" required
                                type="email" class="form-control cajas-texto" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">
                            <select class="form-control form-select-lg cajas-texto p-2 js-example-basic-single" name="ciudad" required>
                                <option value="Seleccionar Ciudad">Ciudad</option>
                                @foreach ($ciudades as $row)
                                <option value="{{$row->ciudad}}">{{$row->ciudad}}</option>
                                @endforeach
                            </select>
                            {{-- <input name="ciudad" placeholder="Ingrese la ciudad en la que se encuentra"
                                pattern="[A-Za-z ]{1,50}" required type="text" class="form-control cajas-texto"
                                id="exampleInputPassword1"> --}}
                        </div>
                        <div class="mb-3">
                            <input name="usuarioInstagram" placeholder="Usuario de Instagram" pattern="{1,50}"
                                required type="text" class="form-control cajas-texto" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <input name="codigo" placeholder="*Código único" pattern="{1,50}" required
                                type="text" class="form-control cajas-texto" id="exampleInputPassword1">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="terminos" required>
                            <label class="form-check-label" for="exampleCheck1"><a href="http://www.cuadernosestilo.com/theme/media/Terminos_y_Condiciones_MegaSorteo.pdf" target="_blank" class="link text-light">Términos y condiciones</a></label>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary send-registro">Enviar <i class="bi bi-send"></i></button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="section p-5 productosGrand">

        <div class="container">
            <div class="row mb-5 section-title">
                <div class="confeti first">
                    <picture>
                        <source srcset="{{asset('img/confeti-1.webp')}}" type="image/webp">
                        <source srcset="{{asset('img/fallback/confeti-1.png')}}" type="image/jpeg">
                        <img src="{{asset('img/fallback/confeti-1.png')}}" alt="estilo">
                    </picture>
                </div>
                <div class="col-12 text-center title-products">
                    <h2 class="f-w sin-padding text-warning saltoL">
                        <span class="sub">C</span>
                        <span class="">A</span>
                        <span class="sub">D</span>
                        <span class="">A</span>
                        <span class="">&nbsp;</span>
                        <span class="sub">M</span>
                        <span class="">E</span>
                        <span class="sub">S</span>
                        <span class="">&nbsp;</span>
                        <br>
                        <span class="">S</span>
                        <span class="sub">O</span>
                        <span class="">R</span>
                        <span class="sub">T</span>
                        <span class="">E</span>
                        <span class="sub">A</span>
                        <span class="">M</span>
                        <span class="sub">O</span>
                        <span class="">S</span>
                    </h2>
                </div>
                <div class="confeti second">
                    <picture>
                        <source srcset="{{asset('img/confeti-2.webp')}}" type="image/webp">
                        <source srcset="{{asset('img/fallback/confeti-2.png')}}" type="image/jpeg">
                        <img src="{{asset('img/fallback/confeti-2.png')}}" alt="estilo">
                    </picture>

                </div>
            </div>
            <div class="row premios-section">
                <div class="col-12 col-md-4">
                    <div class="confeti second">
                        <picture>
                            <source srcset="{{asset('img/confeti-2.webp')}}" type="image/webp">
                            <source srcset="{{asset('img/fallback/confeti-2.png')}}" type="image/jpeg">
                            <img src="{{asset('img/fallback/confeti-2.png')}}" alt="estilo">
                        </picture>
                    </div>
                    <div class="card mb-3 sin-color border-no">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="card-body text-center">
                                    <h1 class="card-title numero f-w text-warning">28</h2>
                                    <p class="card-text h3 f-w text-warning">Mystery Boxes</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <center>
                                    <picture>
                                        <source srcset="{{asset('img/sorteo-box-1.webp')}}" type="image/webp">
                                        <source srcset="{{asset('img/fallback/sorteo-box-1.png')}}" type="image/jpeg">
                                        <img src="{{asset('img/fallback/sorteo-box-1.png')}}" class="img-fluid rounded-start w-vmin" alt="...">
                                    </picture>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card mb-3 sin-color border-no">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="card-body text-center">
                                    <h1 class="card-title numero f-w text-warning">1</h2>
                                    <p class="card-text h3 f-w text-warning">Tablet</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <center>
                                    <picture>
                                        <source srcset="{{asset('img/sorteo-box-2.webp')}}" type="image/webp">
                                        <source srcset="{{asset('img/fallback/sorteo-box-2.png')}}" type="image/jpeg">
                                        <img src="{{asset('img/fallback/sorteo-box-2.png')}}" class="img-fluid rounded-start w-vmin" alt="...">
                                    </picture>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card mb-3 sin-color border-no">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="card-body text-center">
                                    <h1 class="card-title numero f-w text-warning">1</h2>
                                    <p class="card-text h3 f-w text-warning">Bono Escolar de $30</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <center>
                                    <picture>
                                        <source srcset="{{asset('img/sorteo-box-3.webp')}}" type="image/webp">
                                        <source srcset="{{asset('img/fallback/sorteo-box-3.png')}}" type="image/jpeg">
                                        <img src="{{asset('img/fallback/sorteo-box-3.png')}}" class="img-fluid rounded-start w-vmin" alt="...">
                                    </picture>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="confeti first">
                        <picture>
                            <source srcset="{{asset('img/confeti-1.webp')}}" type="image/webp">
                            <source srcset="{{asset('img/fallback/confeti-1.png')}}" type="image/jpeg">
                            <img src="{{asset('img/fallback/confeti-1.png')}}" alt="estilo">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section p-5 codigoGrand">
        <div class="container">
            <div class="row mb-4 section-title">
                <div class="col-12 f-w text-light text-center">
                    <h2>
                        ¿CÓMO ENCONTRAR TU CÓDIGO ÚNICO?
                    </h2>
                </div>
            </div>
            <div class="row">

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card mb-3 sin-color border-no">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="card-body text-left display-inline">
                                        <h5 class="card-title numero f-w text-light">1</h5>
                                        <p class="card-text h4 f-w text-light pt-4 sin-padding">ABRE TU CUADERNO ESTILO</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 sin-padding">
                                    <center>
                                        <div>
                                            <picture>
                                                <source srcset="{{asset('img/codigo-box-1.webp')}}" type="image/webp">
                                                <source srcset="{{asset('img/fallback/codigo-box-1.png')}}" type="image/jpeg">
                                                <img src="{{asset('img/fallback/codigo-box-1.png')}}" class="img-fluid" alt="...">
                                            </picture>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card mb-3 sin-color border-no">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="card-body text-left display-inline">
                                        <h5 class="card-title numero f-w text-light">2</h5>
                                        <p class="card-text h4 f-w text-light pt-4 sin-padding">ENCUENTRA ESTA PÁGINA</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 sin-padding">
                                    <center>
                                        <div>
                                            <picture>
                                                <source srcset="{{asset('img/codigo-box-2.webp')}}" type="image/webp">
                                                <source srcset="{{asset('img/fallback/codigo-box-2.png')}}" type="image/jpeg">
                                                <img src="{{asset('img/fallback/codigo-box-2.png')}}" class="img-fluid" alt="...">
                                            </picture>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card mb-3 sin-color border-no">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="card-body text-left display-inline">
                                        <h5 class="card-title numero f-w text-light">3</h5>
                                        <p class="card-text h4 f-w text-light pt-4 sin-padding">TU CÓDIGO ÚNICO SE VE ASÍ</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 sin-padding">
                                    <center>
                                        <div>
                                            <picture>
                                                <source srcset="{{asset('img/codigo-box-3.webp')}}" type="image/webp">
                                                <source srcset="{{asset('img/fallback/codigo-box-3.png')}}" type="image/jpeg">
                                                <img src="{{asset('img/fallback/codigo-box-3.png')}}" class="img-fluid" alt="...">
                                            </picture>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="row">
                <div class="col-12 f-w text-light text-center final-text">
                    <h2>
                        ¡CADA CÓDIGO QUE INGRESE ES UNA NUEVA OPORTUNIDAD!
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="section p-5 contactoGrand">
        <div class="row">
            <div class="col-12 text-center text-light f-w">
                <P>VIGENCIA DEL SORTEO HASTA EL 30 DE JUNIO DE 2024. DESCUBRE LOS GANADORES DE LOS SORTEOS EL 10 DE CADA MES, EN NUESTRAS REDES SOCIALES</P>
            </div>
            <div class="col-12 text-center">
                <a href="http://www.cuadernosestilo.com/theme/media/Terminos_y_Condiciones_MegaSorteo.pdf" target="_blank" class="btn btn-warning f-w w-50">
                    CONOCE NUESTROS TÉRMINOS Y CONDICIONES AQUÍ
                </a>
            </div>
        </div>
    </div>

    <div class="section p-3 footer">
        <div class="row">
            <div class="col-12 text-center">
                <picture>
                    <source srcset="{{asset('img/logo-papelesa.webp')}}" type="image/webp">
                    <source srcset="{{asset('img/fallback/logo-papelesa.png')}}" type="image/jpeg">
                    <img src="{{asset('img/fallback/logo-papelesa.png')}}" alt="logo-papelesa">
                </picture>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script type="text/javaScript">
@if (session('tag'))
    Swal.fire(
        '{{session("titulo")}}',
        '{{session("message")}}',
        '{{session("tipo")}}'
    )
@endif

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

</script>
@endsection
