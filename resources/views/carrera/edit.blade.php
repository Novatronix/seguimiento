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
            <h3>Editar Carrera: {{$carreras->id_carrera}}</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
            <form action="{{route('carrera.update', $carreras->id_carrera)}}" method="POST">

            @method('PATCH')
            @csrf
                <div class="form-group">
                    <label for="id_carrera">Id Carrera</label>

                    <input type="text" class="form-control" name="id_carrera" disabled value="{{ $carreras->id_carrera}}" placeholder="Ingrese el ID">

                </div>

                <div class="form-group">
                    <label for="nombre_carrera">Nombre de la Carrera</label>

                    <input type="text" class="form-control" name="nombre_carrera" value="{{ $carreras->nombre_carrera }}" placeholder="Ingrese el nombre de la Carrera">

                </div>
        

              
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="{{ url('carrera') }}" class="btn btn-danger">Regresar</a>
            </form>
        </div>
    </div>

</div>

@endsection