@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resumen Alumno</div>

                <div class="card-body">
                
                <p class="lead">Id: {{$alumnos->id_alumno}}</p>
                <p class="lead">Numero de Cuenta: {{$alumnos->num_cuenta}}</p>
                <p class="lead">Nombre: {{$alumnos->nombre}}</p>
                <p class="lead">Apellidos: {{$alumnos->apellidos}}</p>
                <p class="lead">Fecha de Ingreso: {{$alumnos->fecha_ingreso}}</p>
                <p class="lead">Genero: {{$alumnos->genero}}</p>
                <p class="lead">Telefono: {{$alumnos->telefono}}</p>
                <p class="lead">Estado: {{$alumnos->estado}}</p>
                <a href="{{ url('alumno') }}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection