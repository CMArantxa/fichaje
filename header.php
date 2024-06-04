
<?php 
    date_default_timezone_set('America/Mexico_City');
 $fecha_actual = date("d-m-Y h:i:s");
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Fichar</title>
</head>
<body>
    <div class="container">
    <img src="assets/img/logocolor.jpg" alt="logo">
    <input class="date-own form-control" id="reloj"style="font: size 24px;float:right;" type="text" name="date" value="<?php echo $fecha_actual?>"/>
    </div>

  
