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
            <form action="/clase" method="POST">
            @csrf
                <div class="form-group">
                    <label for="id_clase">Id de Clase</label>
                    <input type="text" class="form-control" name="id_clase" placeholder="Ingrese Id de Clase">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre de la Clase</label>
                    <input type="text" class="form-control" name="nombre_clase" placeholder="Ingrese la clase">
                </div>
                
                <div class="form-group">
                    <label for="id_carrera">Carrera</label>
                    <select name="id_carrera" id="id_carrera" class="form-control">
                      <option value="non">--Selecione la carrera donde se asigna la Clase--</option>
                      @foreach ($carreras as $carrera)
                        <option value="{{ $carrera['id_carrera'] }}"> {{ $carrera['nombre_carrera'] }}</option>
                      
                      @endforeach
                    
                    </select>
                </div>

                <div class="form-group">
                    <label for="requisito">Requisito (OPCIONAL)</label>
                    <select name="requisito" id="id_clase" class="form-control">
                      <option value="non">--Seleccione la Clase REQUISITO--</option>
                      @foreach ($clases as $clase)
                        <option value="{{ $clase['id_clase'] }}"> {{ $clase['nombre_clase'] }}</option>
                      
                      @endforeach
                    
                    </select>
                </div>


                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="{{ url('clase') }}" class="btn btn-danger">Cancelar</a>

               
            </form>
        </div>
    </div>

</div>

@endsection