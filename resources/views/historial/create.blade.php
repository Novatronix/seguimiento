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
          <form action="/historial" method="POST">
            @csrf
            
            <div class="form-group">
              <label for="num_cuenta">Alumno</label>
              <select name="num_cuenta" id="num_cuenta" class="form-control">
                <option value="non">--Selecione el Alumno--</option>
                @foreach ($alumnos as $alumno)
                  <option value="{{ $alumno['num_cuenta'] }}"> {{ $alumno['num_cuenta'] }} {{ $alumno['nombre'] }} {{ $alumno['apellidos'] }}</option>
                
                @endforeach
              
              </select>
           </div>
           <div class="form-group">
            <label for="id_periodo">Periodo</label>
            <select name="id_periodo" id="id_clase" class="form-control">
              <option value="non">--Selecione la Clase--</option>
              @foreach ($periodos as $periodo)
                <option value="{{ $periodo['id_periodo'] }}">{{ $periodo['descripcion'] }} Periodo N°: {{ $periodo['semestre'] }} Semestre: {{ $periodo['semestre'] }} Año: {{ $periodo['año'] }}</option>
              
              @endforeach
            
            </select>
         </div>
           <div class="form-group">
            <label for="num_cuenta">Clase</label>
            <select name="id_clase" id="id_clase" class="form-control">
              <option value="non">--Selecione la Clase--</option>
              @foreach ($clases as $clase)
                <option value="{{ $clase['id_clase'] }}"> {{ $clase['id_clase'] }} {{ $clase['nombre_clase'] }}</option>
              
              @endforeach
            
            </select>
         </div>
            <button type="submit" class="btn btn-primary">Registar Nuevo</button>
            <a href="{{ url('') }}" class="btn btn-danger">Cancelar</a>
        </form>
        </div>
    </div>

</div>

@endsection