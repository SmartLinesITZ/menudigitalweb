<?php
session_start();
$login = $_SESSION['login'];
$seguridad = $_SESSION['seguridad'];
if (!isset($seguridad)) {
  echo "<SCRIPT TYPE='text/javascript'>alert('Sin acceso');</SCRIPT>";
  header('Location:../../index.html');
}
$idrestaurante = $_SESSION['idrestaurante'];
include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("SELECT * FROM restaurante where idrestaurante='$idrestaurante';" , $link) or die(mysql_error());
$row=mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="../src/js/jquery.js"></script>
  <script src="../src/js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <title>Perfil</title>
</head>
<nav class="z-depth-2 #00695c teal darken-3" role="navigation">
  <div class="nav-wrapper container">
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="../servicios.php"><i class="material-icons left">headset_mic</i>Servicios</a></li>
      <li><a href="../platillos/read.php"><i class="material-icons left">restaurant_menu</i>Menu de platillos</a></li>
      <li><a href="../pedidos.php"><i class="material-icons left">room_service</i>Pedidos</a></li>
      <li><a href="read.php"><i class="material-icons left">face</i>Perfil</a></li>
      <li><a href="../../index.html"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
    </ul>
  </div>
</nav>
<br><br><br>
<body>
  <div class="center-align">
    <?php
    $ruta = "../../controller/perfil/imagenes/" . $row['logo'];
    ?>
    <img src="<?php echo $ruta?>" class="circle" style=" height: 300px;
     width: 300px;
     background-repeat: no-repeat;
     background-position: 50%;
     border-radius: 80%;
     background-size: 100% 100%">
    <div class="row">
      <div class="col s8 offset-s2">
        <div class="card ">
          <h4 style="color: Green">Nombre de restaurte: <?php echo $row['nombrerest'];?></h4>
          <h4 style="color: Green">Slogan: <?php echo $row['slogan'];?></h4>
          <p style="color: Green">Descripcion: <?php echo $row['descripcion'];?> </p>
          <p style="color: Black">Domicilio: <?php echo $row['domicilio'];?> </p>
          <p style="color: Black">Telefono: <?php echo $row['telefono'];?></p>
          <p style="color: Black">Horarios: <?php echo $row['horarios'];?></p>
        </div>
        <div class="12u" style="text-align: right;" >
          <ul class="actions">
            <li>
              <a class="btn-floating btn-large waves-effect waves-light" style="background: gray; display:scroll; position:fixed; bottom:50px; right:35px;" href="update.php?idrestaurante=<?php echo $row['idrestaurante'];?>"><i class="material-icons">edit</i></a>
            </li>
          </ul>
        </div>
      </div>
    </body>
    </html>
