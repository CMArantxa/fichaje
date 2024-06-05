<?php
session_start();
include("conexion.php");

if (isset($_POST["DNI"]) && isset($_POST["password"])) {
    $dni = $_POST["DNI"];
    $password = $_POST["password"];
    $action = $_POST["action"];
    
    $sql = "SELECT * FROM user WHERE dni=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $dni);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $_SESSION["DNI"] = $dni;
        $timestamp = date("Y-m-d H:i:s");
        
        if ($action == "entrada") {
            $sql_insert = "INSERT INTO registro (dni, entrada) VALUES (?, ?)";
        } else if ($action == "salida") {
            $sql_insert = "INSERT INTO registro (dni, salida) VALUES (?, ?)";
        }
        
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bindParam(1, $dni);
        $stmt_insert->bindParam(2, $timestamp);
        $stmt_insert->execute();
        
        header("Location: index.php?status=success&action=$action");
        exit();
    } else {
        $error = "Acceso inválido";
        header("Location: index.php?status=error&message=" . urlencode($error));
        exit();
    }
}
?>

    <?php include 'header.php' ?>
    <main>
        <form class="row g-3" id="form" method="post" action="registro.php">
            <div class="col-auto">
                <label for="DNI" class="visually-hidden">DNI</label>
                <input type="text" class="form-control" name="DNI" placeholder="DNI" id="DNI" required>
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword2" placeholder="Password" required>
            </div>
            <div class="col-auto">
                <button type="submit" name="action" value="entrada" class="btn btn-primary mb-3">Confirmar Entrada</button>
                <button type="submit" name="action" value="salida" class="btn btn-primary mb-3">Confirmar Salida</button>
            </div>
        </form>
    </main>
    <?php include 'footer.php' ?>
</body>
</html>
