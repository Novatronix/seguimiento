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
    <form action="/alumno" method="POST">
        @csrf
            <div class="form-group">
                <label for="id_alumno">Numero de Cuenta</label>
                <input type="text" class="form-control" name="num_cuenta" placeholder="Ingrese su numero de Cuenta">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese su primer nombre">
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" placeholder="Ingrese sus apellidos">
            </div>

            <div class="form-group">
                <label for="fecha_ingreso">Fecha Ingreso</label>
                <input type="text" class="form-control" name="fecha_ingreso" placeholder="(YYYY-MM-DD)">
            </div>

            <div class="form-group">
                <label for="genero">Genero</label>
                <input type="text" class="form-control" name="genero" placeholder="(Masculino / Femenino)">
            </div>

            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" name="telefono" placeholder="Ingrese su telefono">
            </div>

            <div class="form-group">
                <label for="id_carrera">Carrera</label>
                <select name="id_carrera" id="id_carrera" class="form-control">
                  <option value="non">--Selecione la carrera donde se matricula--</option>
                  @foreach ($carreras as $carrera)
                    <option value="{{ $carrera['id_carrera'] }}"> {{ $carrera['nombre_carrera'] }}</option>
                  
                  @endforeach
                
                </select>
            </div>

            <button type="submit" class="btn btn-success">Registrar</button>
            <a href="{{ url('alumno') }}" class="btn btn-danger">Cancelar</a>
        </form>
        </div>
    </div>

</div>

@endsection