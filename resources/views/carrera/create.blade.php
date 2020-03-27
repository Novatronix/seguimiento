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
            <form action="/carrera" method="POST">
            @csrf
                <div class="form-group">
                    <label for="id_carrera">Id de Carrera</label>
                    <input type="text" class="form-control" name="id_carrera" placeholder="Ingrese id de la carrera">
                </div>

                <div class="form-group">
                    <label for="nombre_carrera">Nombre de la Carrera</label>
                    <input type="text" class="form-control" name="nombre_carrera" placeholder="Ingrese nombre de la carrera">
                </div>
               
                
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="{{ url('carrera') }}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>

</div>

@endsection