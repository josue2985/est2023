@extends('layout.layout2')
@section('body')
    <div class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card mb-3 text-bg-danger">
                        <div class="card-header border-no text-center">
                            <h4>Contador de Visitas</h4>
                        </div>
                        <div class="card-body text-center border-no">
                            <h1 class="card-text">{{$answer}}</h1>
                        </div>
                    </div>
                    <center>
                        <button onclick="refresh()" class="btn btn-success btn-lg">Actualizar</button>
                    </center>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script type="text/javaScript">
function refresh() {
    location.reload();
}
</script>
@endsection
