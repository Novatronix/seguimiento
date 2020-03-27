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
            <h3>Actualizar: {{$historiales->num_cuenta}}</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
            <form action="{{route('historial.update', $historiales->id_historial)}}" method="POST">

            @method('PATCH')
            @csrf
                <div class="form-group">
                    <label for="id_historial">Id Historial</label>

                    <input type="text" class="form-control" name="id_historial" value="{{ $historiales->id_historial}}" placeholder="" disabled>

                </div>

                <div class="form-group">
                    <label for="num_cuenta">Numero de Cuenta</label>

                    <input type="text" class="form-control" name="num_cuenta" value="{{ $historiales->num_cuenta }}" placeholder=""disabled>

                </div>
                
                <div class="form-group">
                    <label for="id_clase">Id Clase</label>

                    <input type="text" class="form-control" name="id_clase" value="{{ $historiales->id_clase }}" placeholder=""disabled>

                </div>
                <div class="form-group">
                    <label for="id_periodo">Id Periodo</label>

                    <input type="text" class="form-control" name="id_clase" value="{{ $historiales->id_periodo }}" placeholder=""disabled>

                </div>

                <div class="form-group">
                    <label for="acumulativo">Acumulativo</label>

                    <input type="text" class="form-control" name="acumulativo" value="{{ $historiales->acumulativo }}" placeholder="">

                </div>
                <div class="form-group">
                    <label for="nota_examen1">Examen Parcial I</label>

                    <input type="text" class="form-control" name="nota_examen1" value="{{ $historiales->nota_examen1 }}" placeholder="">

                </div>
                <div class="form-group">
                    <label for="nota_examen2">Examen Parcial II</label>

                    <input type="text" class="form-control" name="nota_examen2" value="{{ $historiales->nota_examen2 }}" placeholder="">

                </div>
                <div class="form-group">
                    <label for="nota_final">Nota Final</label>

                    <input type="text" class="form-control" name="nota_final" value="{{ $historiales->nota_final }}" placeholder="">

                </div>
                <div class="form-group">
                    <label for="faltas">Faltas</label>

                    <input type="text" class="form-control" name="faltas" value="{{ $historiales->faltas }}" placeholder="">

                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>

                    <input type="text" class="form-control" name="acumulestadoativo" value="{{ $historiales->estado }}" placeholder="">

                </div>
                <div class="form-group">
                    <label for="comentarios">Comentarios</label>

                    <input type="text" class="form-control" name="comentarios" value="{{ $historiales->comentarios }}" placeholder="">

                </div>
            

              
                <button type="submit" class="btn btn-success">Guardar cambios</button>
                <a href="{{ url('historial') }}" class="btn btn-danger">Regresar</a>
            </form>
        </div>
    </div>

</div>

@endsection