@extends('layouts.app')


@section('content')

<div class="container">

<h2>Lista de Alumnos <a href="{{ url('alumno/create') }}"> 
<button type="button" class="btn btn-success float-right">Agregar alumno</button></a>
</h2>
<div class="table-responsive">
<table class="table table-sm">
    <thead class="thead">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Numero de cuenta</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Fecha de Ingreso</th>
        <th scioe="col">Genero</th>
        <th scioe="col">Telefono</th>
        <th scioe="col">Estado</th>
      </tr>
    </thead>
    <tbody>
    
    @foreach($alumnos as $alumno)
      <tr>
        <th scope="row">{{$alumno->id_alumno}}</th>
        <th scope="row">{{$alumno->num_cuenta}}</th>
        <td>{{$alumno->nombre}}</td>
        <td>{{$alumno->apellidos}}</td>
        <td>{{$alumno->fecha_ingreso}}</td>
        <td>{{$alumno->genero}}</td>
        <td>{{$alumno->telefono}}</td>
        <td>{{$alumno->estado}}</td>
        
        <td>
          <form action=" {{route('alumno.destroy', $alumno->id_alumno) }}" method="POST">
          
          <a href="{{ route('alumno.show', $alumno->id_alumno) }}"><button type="button" class="btn btn-secondary">Ver</button></a> 
          <a href="{{ route('alumno.edit', $alumno->id_alumno) }}"><button type="button" class="btn btn-primary">Editar</button></a>
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

  <form action="{{route('alumnos.import.excel')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <input type="file" name="file">
    <button>Importar Alumnos</button>
  </form>

</div>

@endsection