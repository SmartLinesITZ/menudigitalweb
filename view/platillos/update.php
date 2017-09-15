<?php
session_start();
$login = $_SESSION['login'];
$seguridad = $_SESSION['seguridad'];
$idrestaurante=$_SESSION['idrestaurante'];
include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$idplatillo=$_REQUEST['idplatillo'];
$sql = mysql_query("SELECT categoria.nomcategoria,categoria.idcategoria,platillo.nombreplatillo,platillo.precio,platillo.descripcion FROM platillo,categoria where idplatillo='$idplatillo' AND categoria.idcategoria=platillo.idcategoria;" , $link) or die(mysql_error());
$row=mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Guardar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</head>
<body class="grey lighten-2">
  <nav class="z-depth-2 #00695c teal darken-3" role="navigation">
    <div class="nav-wrapper container">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="../servicios.php"><i class="material-icons left">headset_mic</i>Servicios</a></li>
        <li><a href="../../platillos/read.php"><i class="material-icons left">restaurant_menu</i>Menu de platillos</a></li>
        <li><a href="../pedidos.php"><i class="material-icons left">room_service</i>Pedidos</a></li>
        <li><a href="../perfil/read.php"><i class="material-icons left">face</i>Perfil</a></li>
        <li><a href="../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>
  <form class="" action="../../controller/platillos/editplatillo.php?idplatillo=<?php echo $idplatillo?>" method="POST" enctype="ENCYPE">
    <div class="row">
      <div class="col s12">
        <div class="col s6 offset-s3 card-panel ">
          <div class="col s12"><h3 class="center-align">Editar Platillo</h3></div>
          <div class="row">
            <div class="col s6">
              <label>Cetgorira</label>
              <select class="browser-default" name="idcategoria">
                <option value="<?php echo $row['idcategoria'];?>"><?php echo $row['nomcategoria'];?></option>
                <?php    
                $cat = mysql_query("SELECT nomcategoria from categoria where categoria.idrestaurante='$idrestaurante';" , $link) or die(mysql_error());  
                while ($rows = mysql_fetch_array($cat)){   ?>
                <option value="<?php echo $rows['idcategoria']; ?>"><?php echo $rows['nomcategoria']; ?></option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">restaurant</i>
            <input id="nombre" name="nombreplatillo" type="text" class="validate" value="<?php echo $row['nombreplatillo'];?>">
            <label for="nombre">Nombre del platillos</label>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">$</i>
              <input id="precio" name="precio" type="text" class="validate" value="<?php echo $row['precio'];?>">
              <label for="precio">Precio</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">short_text</i>
              <textarea id="textarea1" name="descripcion" class="materialize-textarea" ><?php echo $row['descripcion'];?></textarea>
              <label for="textarea1">Descripcion</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s9">
              <i class="material-icons prefix">add_a_photo</i>
              <input name="imagen" id="imagen" type="file" class="validate">
              <label for="imagen"></label>
            </div>
          <div class=" col s3">
            <button class="waves-effect waves-light btn #00695c teal darken-3" type="submit">
             Guardar
           </button> 
         </div>
       </div>
     </div>
   </div>
 </div>
</form>
</body>
</html>
