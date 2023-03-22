@section('title', "Registro Participantes")
@extends('layout.layout2')
<link rel="stylesheet" href="{{asset('css/boxicons.min.css')}}">
<style>
    body {
        background-color: #ededed !important;
    }
</style>
@section('body')

    <div class="section resumen-section">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 p-0 pt-5">
                    <h1 class="fw-bolder pb-3">Usuarios</h1>
                    <form class="row g-3" method="POST" action="{{route('rangoFecha')}}">
                        @csrf
                        <div class="col-auto col-6">
                          <label for="staticEmail2" class="visually">Fecha Inicial</label>
                          <input name="fechaInicial" type="date" class="form-control" id="staticEmail2" required>
                        </div>
                        <div class="col-auto col-6">
                          <label for="inputPassword2" class="visually">Fecha Final</label>
                          <input name="fechaFinal" type="date" class="form-control" id="inputPassword2">
                        </div>
                        <div class="col-auto col-6">
                            <button type="submit" class="btn btn-primary btn-filters">Buscar</button>
                        </div>
                        <div class="col-auto col-6">
                            <a href="{{route('inscritos')}}" class="btn btn-delete btn-filters">Limpiar</a>
                            {{-- <button type="button" id="limpiar" class="btn btn-delete btn-filters">Limpiar</button> --}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4 p-0" style="overflow-x: auto;">
                    <table class="table w-100 nowrap" id="inscritos">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">código</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Fecha de registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @foreach ($answer as $row)
                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td>{{$row->nombre}} {{$row->apellido}}
                                    <br>
                                    <span class="ig-user">{{'@'.$row->usuarioInstagram}}</span>
                                </td>
                                <td><div class="ig-user">Código</div>{{$row->codigo}}</td>
                                <td>{{$row->ciudad}}</td>
                                <td>{{$row->correo}}</td>
                                <td>{{$row->telefono}}</td>
                                <td>{{substr($row->created_at,0,11)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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

// $('#limpiar').click(function (e) {
//     e.preventDefault();
//     window.location.reload()
// });

$(document).ready( function () {
    $('#inscritos').DataTable({
        "language": {
            "url": "{{asset('lang/es.json')}}"
        },
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });
} );
</script>
@endsection
