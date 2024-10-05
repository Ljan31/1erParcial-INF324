<?php
include 'conexion.php';

$sql = "select p.ci, p.nombre, p.paterno, c.id,
    case when c.id like '1%' then 'Impuesto Alto'
        when c.id like '2%' then 'Impuesto Medio'
        when c.id like '3%' then 'Impuesto Bajo'
        else 'Sin Clasificación'
    end as tipo_impuesto
from persona p
join catastro c ON p.ci = c.ci
order by c.id;";
$res = mysqli_query($conn, $sql);
$personas = [
  'Impuesto Alto' => [],
  'Impuesto Medio' => [],
  'Impuesto Bajo' => [],
  'Sin Clasificación' => []
];

while ($row = mysqli_fetch_assoc($res)) {
  $personas[$row['tipo_impuesto']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Personas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  
  <?php include('./nav.php'); ?>

  <main>
      <div class="text-center mt-3">
          <h1>Lista de Personas por Impuesto</h1>
      </div>
      <div class="container mt-5">
          <table class="table table-striped">
              <thead class="table-dark">
                  <tr>    
                      <th>Impuesto Alto</th>
                      <th>Impuesto Medio</th>
                      <th>Impuesto Bajo</th>
                  </tr>
              </thead>
              <tbody class="table-group-divider">
                  <?php
                  $max_count = max(
                      count($personas['Impuesto Alto']),
                      count($personas['Impuesto Medio']),
                      count($personas['Impuesto Bajo']),
                      count($personas['Sin Clasificación'])
                  );

                  for ($i = 0; $i < $max_count; $i++) {
                      echo "<tr>";
                      echo "<td>" . (isset($personas['Impuesto Alto'][$i]) ? $personas['Impuesto Alto'][$i]['ci'] . ' - ' . $personas['Impuesto Alto'][$i]['nombre'] . ' ' . $personas['Impuesto Alto'][$i]['paterno'] . ' (COD: ' . $personas['Impuesto Alto'][$i]['id'] . ')' : '') . "</td>";
                      echo "<td>" . (isset($personas['Impuesto Medio'][$i]) ? $personas['Impuesto Medio'][$i]['ci'] . ' - ' . $personas['Impuesto Medio'][$i]['nombre'] . ' ' . $personas['Impuesto Medio'][$i]['paterno'] . ' (COD: ' . $personas['Impuesto Medio'][$i]['id'] . ')' : '') . "</td>";
                      echo "<td>" . (isset($personas['Impuesto Bajo'][$i]) ? $personas['Impuesto Bajo'][$i]['ci'] . ' - ' . $personas['Impuesto Bajo'][$i]['nombre'] . ' ' . $personas['Impuesto Bajo'][$i]['paterno'] . ' (COD: ' . $personas['Impuesto Bajo'][$i]['id'] . ')' : '') . "</td>";
                      echo "</tr>";
                  }
                  ?>
              </tbody>
          </table>
      </div>        
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>