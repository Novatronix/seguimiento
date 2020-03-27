

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resumen Carrera</div>

                <div class="card-body">
                    <p class="lead">Id Carrera: {{$carreras->id_carrera}}</p>
                     <p class="lead">Nombre de Carrera: {{$carreras->nombre_carrera}}</p>
               
                <a href="/carrera" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection