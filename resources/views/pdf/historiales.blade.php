<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>HTML</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <h2>Historial de Prinmer Ingreso</h2>
  <table class="table table-striped">
      <thead>
          <tr>
              <th>Id Historial</th>
              <th>Numero de Cuenta</th>
              <th>Id Clase</th>
              <th>Id Periodo</th>
              <th>Acumulativo</th>
              <th>Nota Examen Parcial I</th>
              <th>Nota Examen Parcial I</th>
              <th>Nota Final</th>
              <th>Faltas</th>
              <th>Estado</th>
              <th>Comentarios</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($historiales as $historial)
          <tr>
              <td>{{$historial->id_historial}}</td>
              <td>{{$historial->num_cuenta}}</td>
              <td>{{$historial->id_clase}}</td>
              <td>{{$historial->id_periodo}}</td>
              <td>{{$historial->acumulativo}}</td>
              <td>{{$historial->nota_examen1}}</td>
              <td>{{$historial->nota_examen2}}</td>
              <td>{{$historial->nota_final}}</td>
              <td>{{$historial->faltas}}</td>
              <td>{{$historial->estado}}</td>
              <td>{{$historial->comentarios}}</td>
          </tr>
          @endforeach
      </tbody>
  </table>


</body>
</html>