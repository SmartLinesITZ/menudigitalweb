<?php
include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$idrestaurante=$_REQUEST['idrestaurante'];
$sql = mysql_query("SELECT * FROM restaurante where idrestaurante='$idrestaurante' ;" , $link) or die(mysql_error());
$row=mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../../src/assets/css/main.css" />
<link rel="stylesheet" href="http://www.anerbarrena.com/demos/2014/002-time-input-html5.php">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="landing">
<div id="page-wrapper">
  <header id="header" class="alt">
    <h1><a href="../inicio.html">Clic And Eat</a> </h1>
    <nav id="nav">
      <ul>
        <li><a href="../servicios.html"><i class="material-icons">headset_mic</i> Servicios</a></li>
        <li><a href="../platillos/read.html"><i class="material-icons">restaurant_menu</i>Menu de platillos</a></li>
        <li><a href="../pedidos.html"> <i class="material-icons">room_service</i> Pedidos</a></li>
        <li><a href="../perfil/read.html"> <i class="material-icons">face</i>Perfil</a></li>
        <li><a href="../../index.html" class="button">Cerrar Sesión</a></li>
      </ul>
    </nav>
    </header>
<form action="../../controller/perfil/editarperfil.php?idrestaurante=2" method="POST" enctype="ENCYPE">
    <section id="banner">
      <img src="http://s3-us-west-1.amazonaws.com/facilite/V2/files/objeto/logo/80/59/691386804555/WINGS_ARMY_logo.jpg" alt=""
      style="height: 300px; width: 300px;
      background-repeat: no-repeat;
      background-position: 50%;
      border-radius: 80%;
      background-size: 100% 100%;">
      <input type="file" name="file" id="file" class="inputfile" style="width: 0.1px;
	     height: 0.1px;
	      opacity: 0;
	      overflow: hidden;
	      position: absolute;
	      z-index: -1;" />
      <label for="file" style="color: black;"><strong>Cambaiar Logo ></strong></label>
      <section id="main" class="container 75%">
        <div class="box">
          <div class="12u">
            ""
            <input id="" name="nombrerest" type="text" value="<?php echo $row['nombrerest'];?>" placeholder="Nombre del restaurante">
          </div>
          <div class="12u">
            ""
            <input id="" name="slogan" type="text"  value="<?php echo $row['slogan'];?>" placeholder="Slogan">
          </div>
          <br>
          <div class="12u">
            <textarea id="" name="descripcion"  placeholder="Descripcion"><?php echo $row['descripcion'];?></textarea>
            <br>
          </div>
          <div class="12u">
            <input id="" name="domicilio" type="text"  value="<?php echo $row['domicilio'];?>" placeholder="Domicilio completo">
          </div>
          <div class="12u">
            ""
            <input id="" name="telefono" type="text"  value="<?php echo $row['telefono'];?>" placeholder="Telefono">
          </div>
         <br>
          <div class="12u">
            <input id="" name="horarios" type="text"  value="<?php echo $row['horarios'];?>" placeholder="Horarios">
          </div>
        </div>
        <div class="12u" style="text-align: right;" >
          <ul class="actions">
            <li>
              <button type="submit" style="background: gray; display:scroll; position:fixed; bottom:50px; right:35px;">Guardar Cambios</button>
            </li>
          </ul>
        </div>
      </div>

    </section>
    </form>
</body>
</html>
