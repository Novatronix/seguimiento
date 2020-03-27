
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resumen Periodo</div>

                <div class="card-body">
                    <p class="lead">Id Periodo: {{$periodos->id_periodo}}</p>
                     <p class="lead">Numero de Periodo: {{$periodos->num_periodo}}</p>
                     <p class="lead">Semestre: {{$periodos->semestre}}</p>
                     <p class="lead">Año: {{$periodos->año}}</p>
                     <p class="lead">Descripcion: {{$periodos->descripcion}}</p>
               
                     <a href="{{ url('periodo') }}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection