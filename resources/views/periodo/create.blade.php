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
            <form action="/periodo" method="POST">
            @csrf
                
                <div class="form-group">
                    <label for="num_periodo">Numero periodo</label>
                    <input type="text" class="form-control" name="num_periodo" placeholder="Ingrese el numero del periodo">
                </div>
                <div class="form-group">
                    <label for="semestre">Semestre</label>
                    <input type="text" class="form-control" name="semestre" placeholder="Ingrese el semestre">
                </div>
                <div class="form-group">
                    <label for="año">Año</label>
                    <input type="text" class="form-control" name="año" placeholder="Ingrese el año">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" placeholder="Ingrese una descripcion">
                </div>


              

               
                
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="{{ url('periodo') }}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>

</div>

@endsection