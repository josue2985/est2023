@extends('layout.layout2')
<style>
    body {
        background-color: #ededed !important;
    }
</style>
@section('body')
    <div class="dashboard-section container mt-4 p-2">
        <div class="row">
            <div class="col-12">
                <h1 class="fw-bolder pb-3">Resumen</h1>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle mb-4" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Últimos meses
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item meses" data='3' href="#">3 meses</a></li>
                        <li><a class="dropdown-item meses" data='5' href="#">6 meses</a></li>
                        <li><a class="dropdown-item meses" data='12' href="#">12 meses</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="align-items-center card-header d-flex pt-3">
                        <i class="bi-bar-chart-fill me-2"></i> <h3 class="fw-semibold m-0">Estadística</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div id="con-canvas" style="position: relative; height:40vh; width:100vw">
                                {{-- <canvas id="grafica" width="100%" height="30%"></canvas> --}}
                                <canvas id="grafica"></canvas>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-4 col-12 col-md-6">
                <div class="card">
                    <div class="align-items-center card-header d-flex pt-3">
                        <i class="bi-people-fill me-2"></i> <h3 class="fw-semibold m-0">Visitas totales</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <center>
                                <h1 class="card-text fw-bolder" id="contador">1500</h1>
                            </center>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-4 col-12 col-md-6">
                <div class="card top-cities">
                    <div class="align-items-center card-header d-flex pt-3">
                        <i class="bi-geo-alt-fill me-2"></i> <h3 class="fw-semibold m-0">Top 5 ciudades</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($topCinco as $row)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $row->ciudad }}
                                <span class="badge rounded-pill">{{ $row->frequency }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <form id="form">
        @csrf
    </form>
@endsection
@section('javascript')
    <script src="{{asset('chart/chart.umd.js')}}"></script>
    <script text="javaScript">
        let myChart

        function mes(tipo, op, anio, mes) {
            let ejeX = [];
            let ejeY = [];
            let total = [];
            const postData = {
                anio: anio,
                mes: mes,
                _token: $('input[name="_token"]').val()
            };

            $.get("{{ route('porMes') }}", postData,
                function(respuesta) {
                    // console.log(respuesta)
                    let estudiantes = JSON.parse(respuesta);
                    let meses = {
                        "1": "ENERO",
                        "2": "FEBRERO",
                        "3": "MARZO",
                        "4": "ABRIL",
                        "5": "MAYO",
                        "6": "JUNIO",
                        "7": "JULIO",
                        "8": "AGOSTO",
                        "9": "SIEMBRE",
                        "10": "OCTUBRE",
                        "11": "NOVIEMBRE",
                        "12": "DICIEMBRE",
                    }
                    let caracter = "";
                    let mes = [];
                    for (let x = 0; x < estudiantes.length; x++) {
                        caracter = estudiantes[x].fecha
                        mes = caracter.split('-')

                        ejeX.push(mes[0] + '-' + meses[mes[1] * 1])
                        ejeY.push(estudiantes[x].frequency)
                    }
                    if (tipo == 'horizontal') {
                        graficaHorizontal(ejeX, ejeY, op, 'Se han generado la', 'grafica')
                    } else {
                        grafica(ejeX, ejeY, tipo, 'Se han generado', 'grafica')
                    }
                }
            );


        }

        function grafica(x, y, type, title, id) {
            var ctx = document.getElementById(id).getContext('2d');

            if (myChart) {
                myChart.destroy();
            }

            myChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: x,
                    datasets: [{
                        label: title,
                        data: y,
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 206, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(153, 102, 255)',
                            'rgba(255, 159, 64)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 206, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(153, 102, 255)',
                            'rgba(255, 159, 64)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                }
            });

            myChart.canvas.parentNode.style.height = '400px';
            myChart.canvas.parentNode.style.width = '100%';

            myChart.canvas.style.height = '400px';
            myChart.canvas.style.width = '100%';

        }

        function graficaHorizontal(x, y, type, title, id) {
            var ctx = document.getElementById(id).getContext('2d');
            if (myChart) {
                myChart.destroy();
            }
            var myChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: x,
                    datasets: [{
                        label: title,
                        data: y,
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 206, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(153, 102, 255)',
                            'rgba(255, 159, 64)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 206, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(153, 102, 255)',
                            'rgba(255, 159, 64)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }

                }
            });
        }

        //{{-- CONTADOR DE VISTAS --}}
        function vistas() {
            const getData = {
                _token: $('input[name="_token"]').val()
            };
            $.get("{{ route('vistas') }}", getData,
                function(answer) {
                    let vistas = JSON.parse(answer);
                    $("#contador").text(vistas)
                }
            );
        }

        // MESES
        $('.meses').click(function (e) {
            e.preventDefault();
            let ultimo = $(this).attr('data');
            $(this).parent().parent().siblings().text($(this).text());
            mes('bar', 'g', '2019', ultimo)
        });
        mes('bar', 'g', '2019', '3');

        // function myFunction(x) {
        //     let grafica = document.getElementById('grafica');
        //     if (x.matches) { // If media query matches
        //         // grafica.height = "100";
        //         console.log("as")
        //     }else{
        //         console.log("no")
        //     }
        // }

        // var x = window.matchMedia("(max-width: 900px)")
        // myFunction(x) // Call listener function at run time
        // x.addListener(myFunction)


        setInterval(() => {
            vistas();
        }, 500);
    </script>
@endsection
