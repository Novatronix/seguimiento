

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resumen Clase</div>

                <div class="card-body">
                    <p class="lead">Id Clase: {{$clases->id_clase}}</p>
                     <p class="lead">Nombre de la Materia: {{$clases->nombre_clase}}</p>
               
                     <a href="{{ url('clase') }}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection