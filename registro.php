<?php include 'header.php'?>
<?php
session_start();
if(isset($_POST["DNI"])){
  include("conexion.php");
  $dni=$_POST["DNI"];
  $password=$_POST ["password"];
  $sql="select * from user where dni=? and password=?";
  $stmt= $conn->prepare($sql);
  $stmt->bindParam(1,$dni);
  $stmt->bindParam(2,$password);
  $stmt-> execute();
  if ($stmt->rowCount()>0){
    $_SESSION["DNI"]=$dni;
   echo "Validación OK";
  }else{
    $error= "Acceso inválido";
  }
}

?>
<main>
    <form class="row g-3" id="form">
  <div class="col-auto">
    <label for="DNI" class="visually-hidden">DNI</label>
    <input type="text" class="form-control"  placeholder="DNI" id="DNI" >
  </div>
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Password</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <div class="col-auto">
    <button id="boton" type="submit" class="btn btn-primary mb-3">Confirmar Entrada</button>
    <button id="boton" type="submit" class="btn btn-primary mb-3">Confirmar Salida</button>
  </div>
</form>
</main>

<?php include 'footer.php'?>
