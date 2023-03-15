@extends('layout.layout2')
@section('body')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-3">
                <ul class="list-group">
                    <li class="list-group-item" aria-current="true"><strong>TOP 5 CIUDADES</strong></li>
                    @foreach ($topCinco as $row)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $row->ciudad }}
                            <span class="badge bg-primary rounded-pill">{{ $row->frequency }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-9">
                <ul class="list-group">
                    <li class="list-group-item" aria-current="true"><strong>Ciudades</strong></li>
                    <li class="list-group-item">
                        <table class="table table-info table-striped w-100" id="ciudades">
                            <thead>
                                <tr>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ciudad as $row)
                                <tr>
                                    <td>{{ $row->ciudad }}</td>
                                    <td>{{ $row->frequency }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script type="text/javaScript">
$(document).ready( function () {
    $('#ciudades').DataTable();
} );
</script>
@endsection
