@extends('layouts.app')


@section('content')

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Editar Alumno: {{$alumnos->id_alumno}}</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
            <form action="{{route('alumno.update', $alumnos->id_alumno)}}" method="POST">

            @method('PATCH')
            @csrf
                <div class="form-group">
                    <label for="num_cuenta">Numero de cuenta</label>

                    <input type="text" class="form-control" name="numero_de_cuenta" value="{{ $alumnos->num_cuenta }}" placeholder="" disabled>

                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>

                    <input type="text" class="form-control" name="nombre" value="{{ $alumnos->nombre }}" placeholder="Ingrese su nombre">

                </div>

                <div class="form-group">
                    <label for="apellidos">Apellido</label>
                    <input type="text" class="form-control" name="apellidos" value="{{ $alumnos->apellidos }}" placeholder="Ingrese su apellido">

                </div>

                <div class="form-group">
                    <label for="fecha_ingreso">Fecha de Ingreso</label>

                    <input type="text" class="form-control" name="fecha_ingreso" value="{{ $alumnos->fecha_ingreso }}" placeholder="Ingrese fecha de ingreso">

                </div>

                <div class="form-group">
                    <label for="genero">Genero</label>
                    <input type="text" class="form-control" name="genero" value="{{ $alumnos->genero }}" placeholder="Masculino/Femenino">
                </div>

                <div class="form-group">
                    <label for="telefono">Telefono</label>

                    <input type="text" class="form-control" name="telefono" value="{{ $alumnos->telefono }}" placeholder="Ingrese telefono">

                <div class="form-group">
                    <label for="estado">Estado</label>

                    <input type="text" class="form-control" name="estado" value="{{ $alumnos->estado }}" placeholder="Ingrese el estado del alumno">

                </div>
               
                <button type="submit" class="btn btn-success">Guardar cambios</button>
                <a href="{{ url('alumno') }}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>

</div>

@endsection