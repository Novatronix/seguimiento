@extends('layouts.app')


@section('content')

<div class="container">
<h2>Historial Primer Ingreso <a href="{{ url('historial/create') }}"> <button type="button" class="btn btn-success float-right">Crear Nuevo Registro</button></a></h2>
<div class="table-responsive">
  <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Id Historial</th>
        <th scope="col">Numero de Cuenta</th>
        <th scope="col">Id Clase</th>
        <th scope="col">Faltas</th>
        <th scope="col">Acumulativo</th>
        <th scope="col">Examen Parcial 1</th>
        <th scope="col">Estado</th>
        <th scope="col">Comentarios</th>    
       
      </tr>
    </thead>
    <tbody>
    @foreach($historiales as $historial)
      <tr>
        <th scope="row">{{$historial->id_historial}}</th>
        <td>{{$historial->num_cuenta}}</td>
         <td>{{$historial->id_clase}}</td>
         <td>{{$historial->faltas}}</td>
         <td>{{$historial->acumulativo}}</td>
         <td>{{$historial->nota_examen1}}</td>
         <td>{{$historial->estado}}</td>
         <td>{{$historial->comentarios}}</td>

      
        
        <td>
          <form action=" {{route('historial.destroy', $historial->id_historial) }}" method="POST">
          
          <a href="{{ route('historial.show', $historial->id_historial) }}"><button type="button" class="btn btn-secondary">Ver</button></a> 
          <a href="{{ route('historial.edit', $historial->id_historial) }}"><button type="button" class="btn btn-primary">Actualizar</button></a>
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