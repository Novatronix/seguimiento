@extends('layouts.app')


@section('content')

<div class="container">
<h2>Carreras Pre Grado <a href="carrera/create"> <button type="button" class="btn btn-success float-right">Agregar Carrera</button></a></h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID Carrera</th>
        <th scope="col">Nombre de la Carrera</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($carreras as $carrera)
      <tr>
        <th scope="row">{{$carrera->id_carrera}}</th>
        <td>{{$carrera->nombre_carrera}}</td>
      
        
        <td>
          <form action=" {{route('carrera.destroy', $carrera->id_carrera) }}" method="POST">
          
          <a href="{{ route('carrera.show', $carrera->id_carrera) }}"><button type="button" class="btn btn-secondary">Ver</button></a> 
          <a href="{{ route('carrera.edit', $carrera->id_carrera) }}"><button type="button" class="btn btn-primary">Editar</button></a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
        
      </tr>
    @endforeach
    </tbody>
  </table>
 
</div>
@endsection