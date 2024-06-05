<?php include 'header.php' ?>
<?php
session_start();
include("conexion.php");

// Recuperar los últimos 5 fichajes
$sql_recent = "SELECT u.name, r.entrada, r.salida 
               FROM registro r 
               JOIN user u ON r.dni = u.dni 
               ORDER BY GREATEST(COALESCE(r.entrada, '1970-01-01'), COALESCE(r.salida, '1970-01-01')) DESC 
               LIMIT 5";
$stmt_recent = $conn->prepare($sql_recent);
$stmt_recent->execute();
$recent_fichajes = $stmt_recent->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="cuerpo">
<h1 id="animated-title">TU MEJOR SOLUCIÓN</h1> 
</div>
<div id="buton">
<a class="btn " href="registro.php" role="button">Registro</a>
</div>
<div class="tabla">
<table class="table table-dark table-sm">
<thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Entrada</th>
      <th scope="col">Salida</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($recent_fichajes as $fichaje): ?>
    <tr class="table-active">
      <th scope="row"><?= htmlspecialchars($fichaje['name']) ?></th>
      <td><?= htmlspecialchars($fichaje['entrada']) ?></td>
      <td><?= htmlspecialchars($fichaje['salida']) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<script src="assets/js/script.js"></script>
<?php include 'footer.php' ?>
