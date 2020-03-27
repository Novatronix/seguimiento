@extends('layouts.app')


@section('content')

<div class="container">
<h2>Lista de Clases <a href="{{ url('clase/create') }}"> <button type="button" class="btn btn-success float-right">Agregar Clase</button></a></h2>
<div class="table-responsive">
  <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">ID Clase</th>
        <th scope="col">Nombre de Asignatura</th>
        <th scope="col">Clase Previa</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($clases as $clase)
      <tr>
        <th scope="row">{{$clase->id_clase}}</th>
        <td>{{$clase->nombre_clase}}</td>
        <td>{{$clase->requisito}}</td>
      
        
        <td>
          <form action=" {{route('clase.destroy', $clase->id_clase) }}" method="POST">
          
          <a href="{{ route('clase.show', $clase->id_clase) }}"><button type="button" class="btn btn-secondary">Ver</button></a> 
          <a href="{{ route('clase.edit', $clase->id_clase) }}"><button type="button" class="btn btn-primary">Editar</button></a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>

   
  </table>
  <form action="{{route('clases.import.excel')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <input type="file" name="file">
    <button>Importar Clases</button>
  </form>

</div>
@endsection