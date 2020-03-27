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
            <h3>Editar Clase: {{$clases->id_carrera}}</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
            <form action="{{route('clase.update', $clases->id_clase)}}" method="POST">

            @method('PATCH')
            @csrf
                <div class="form-group">
                    <label for="id_clase">Id Clase</label>

                    <input type="text" class="form-control" name="id_clase" value="{{ $clases->id_clase}}" placeholder="" disabled>

                </div>

                <div class="form-group">
                    <label for="nombre_clase">Nombre de la Clase</label>

                    <input type="text" class="form-control" name="nombre_clase" value="{{ $clases->nombre_clase }}" placeholder="Ingrese el nombre de la Clase">

                </div>
        

              
                <button type="submit" class="btn btn-success">Guardar cambios</button>
                <a href="{{ url('clase') }}" class="btn btn-danger">Regresar</a>
            </form>
        </div>
    </div>

</div>

@endsection