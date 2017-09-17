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
  <form action="../../controller/perfil/editarperfil.php?idrestaurante=<?php echo $idrestaurante?>" method="POST" enctype="multipart/form-data">
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
            <div class="file-field input-field">
              <div class="btn">
                <span>Subir foto</span>
                <input name="foto" id="imagen" type="file" class="validate" class="btn" data-input="false">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
            <div class="input-field">
              <input id="nombre"type="text" style="color: Green" value="<?php echo $row['nombrerest'];?>"/>
              <label class="active"for="nombre">Nombre de restaurte:</label>
            </div>
            <div class="input-field">
              <input id="slogan"type="text" style="color: Green" value="<?php echo $row['slogan'];?>"/>
              <label class="active"for="slogan">Slogan:</label>
            </div>
            <div class="input-field">
              <input id="descripcion"type="text" style="color: Green" value="<?php echo $row['descripcion'];?>"/>
              <label class="active"for="descripcion">Descripcion:</label>
            </div>
            <div class="input-field">
              <input id="dir"type="text" style="color: Black" value="<?php echo $row['domicilio'];?>"/>
              <label class="active"for="dir">Domicilio:</label>
            </div>
            <div class="input-field">
              <input id="telefono"type="text" style="color: Black" value="<?php echo $row['telefono'];?>"/>
              <label class="active"for="telefono">Telefono:</label>
            </div>
            <div class="input-field">
              <input id="horarios"type="text" style="color: Black" value="<?php echo $row['horarios'];?>"/>
              <label class="active"for="horarios">Horarios:</label>
            </div>
          </div>
          <div class="12u" style="text-align: right;" >
            <ul class="actions">
              <li>
              </li>
            </ul>
          </div>
        </div>
        <div class="12u" style="text-align: right;" >
          <ul class="actions">
            <li>
              <button class="btn-floating btn-large waves-effect waves-light"type="submit"
              style="background: gray; display:scroll; position:fixed; bottom:50px; right:35px;">
              <i class="material-icons">save</i></button>
            </li>
          </ul>
        </div>
      </form>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

      <script type="text/javascript">
      function initialize() {

        var input = document.getElementById('dir');
        var autocomplete = new google.maps.places.Autocomplete(input);
      }

      google.maps.event.addDomListener(window, 'load', initialize);
      </script>
    </body>
    </html>
