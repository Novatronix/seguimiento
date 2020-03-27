

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resumen Historial Alumno</div>

                <div class="card-body">
                    <p class="lead">Id Historial: {{$historiales->id_historial}}</p>
                     <p class="lead">Numero de Cuenta: {{$historiales->num_cuenta}}</p>
                     <p class="lead">Id Clase: {{$historiales->id_clase}}</p>
                     <p class="lead">Id Periodo: {{$historiales->id_periodo}}</p>
                     <p class="lead">Acumulativo: {{$historiales->acumulativo}}</p>
                     <p class="lead">Nota Examen I Parcial: {{$historiales->nota_examen1}}</p>
                     <p class="lead">Nota Examen II Parcial: {{$historiales->nota_examen2}}</p>
                     <p class="lead">Nota Final: {{$historiales->nota_final}}</p>
                     <p class="lead">Faltas: {{$historiales->faltas}}</p>
                     <p class="lead">Estado: {{$historiales->estado}}</p>
                     <p class="lead">Comentarios: {{$historiales->comentarios}}</p>
               
                <a href="/historial" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection