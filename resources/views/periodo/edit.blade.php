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
            <h3>Editar Periodo: {{$periodos->id_periodo}}</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
            <form action="{{route('periodo.update', $periodos->id_periodo)}}" method="POST">

            @method('PATCH')
            @csrf
                

                <div class="form-group">
                    <label for="num_periodo">Numero de Periodo</label>

                    <input type="text" class="form-control" name="num_periodo" value="{{ $periodos->num_periodo }}" placeholder="(1-4)">

                </div>
                <div class="form-group">
                    <label for="semestre">Semestre</label>

                    <input type="text" class="form-control" name="semestre" value="{{ $periodos->semestre }}" placeholder="(1-2)">

                </div>
                <div class="form-group">
                    <label for="año">Año</label>

                    <input type="text" class="form-control" name="año" value="{{ $periodos->año }}" placeholder="(20xx)">

                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>

                    <input type="text" class="form-control" name="descripcion" value="{{ $periodos->descripcion }}" placeholder="(Q1-5)">

                </div>

              
                <button type="submit" class="btn btn-success">Guardar cambios</button>
                <a href="{{ url('periodo') }}" class="btn btn-danger">Regresar</a>
            </form>
        </div>
    </div>

</div>

@endsection