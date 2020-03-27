<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>HTML</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <h2>Alumnos de Primer Ingreso</h2>
  <table class="table table-striped">
      <thead>
          <tr>
              <th>Id Alumnos</th>
              <th>Numero de Cuenta</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Fecha de Ingreso</th>
              <th>Genero</th>
              <th>Telefono</th>
              <th>Estado</th>
          </tr>
      </thead>
      
      <tbody>
          @foreach ($alumnos as $alumno)
          <tr>
              <td>{{$alumno->id_alumno}}</td>
              <td>{{$alumno->num_cuenta}}</td>
              <td>{{$alumno->nombre}}</td>
              <td>{{$alumno->apellidos}}</td>
              <td>{{$alumno->fecha_ingreso}}</td>
              <td>{{$alumno->genero}}</td>
              <td>{{$alumno->telefono}}</td>
              <td>{{$alumno->estado}}</td>
          </tr>
          @endforeach
        
      </tbody>
  </table>


</body>
</html>