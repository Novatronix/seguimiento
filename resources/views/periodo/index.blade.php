@extends('layouts.app')


@section('content')

<div class="container">
<h2>Periodos Academicos <a href="{{ url('periodo/create') }}"> <button type="button" class="btn btn-success float-right">Agregar Periodo</button></a></h2>
<div class="table-responsive">
  <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">ID Periodo</th>
        <th scope="col">Numero del periodo</th>
        <th scope="col">Semestre</th>
        <th scope="col">Año</th>
        <th scope="col">Descripcion</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($periodos as $periodo)
      <tr>
        <th scope="row">{{$periodo->id_periodo}}</th>
        <td>{{$periodo->num_periodo}}</td>
        <td>{{$periodo->semestre}}</td>
        <td>{{$periodo->año}}</td>
        <td>{{$periodo->descripcion}}</td>
      
        
        <td>
          <form action=" {{route('periodo.destroy', $periodo->id_periodo) }}" method="POST">
          
          <a href="{{ route('periodo.show', $periodo->id_periodo) }}"><button type="button" class="btn btn-secondary">Ver</button></a> 
          <a href="{{ route('periodo.edit', $periodo->id_periodo) }}"><button type="button" class="btn btn-primary">Editar</button></a>
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