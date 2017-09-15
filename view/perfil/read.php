
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
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../../src/assets/css/main.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style type="text/css">
    #imagen{
     height: 300px; 
     width: 300px;
     background-repeat: no-repeat;
     background-position: 50%;
     border-radius: 80%;
     background-size: 100% 100%
   }

 </style>
</head>
<body class="landing">
  <div id="page-wrapper">
    <header id="header" class="alt">
      <h1><a href="../inicio.html">Clic And Eat</a> </h1>
      <nav id="nav">
        <ul>
          <li><a href="../servicios.php"><i class="material-icons">headset_mic</i> Servicios</a></li>
          <li><a href="../platillos/read.php"><i class="material-icons">restaurant_menu</i>Menu de platillos</a></li>
          <li><a href="../pedidos.php"> <i class="material-icons">room_service</i> Pedidos</a></li>
          <li><a href="read.php"> <i class="material-icons">face</i>Perfil</a></li>
          <li><a href="../../index.html" class="button">Cerrar Sesión</a></li>
        </ul>
      </nav>
    </header>
    <section id="banner">
      <!--<img src="<?php echo $row['logo'];?>" alt="">-->
      <div class="row">
        <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-12">
         <?php
         $imagen = @mysql_fetch_array($sql);
           $ruta = "imagenes/" . $imagen['foto'];
           ?>  

           <div class="col-md-4 col-xs-8">
            <div class="row">
              <img src="<?php echo $ruta;?>">
            </div>
          </div>
        </div>
      </div>
      <section id="main" class="container 75%">
        <div class="box">
          <h4 style="color: Green">Nombre de restaurte: <?php echo $row['nombrerest'];?></h4>
          <h3 style="color: Green">Slogan: <?php echo $row['slogan'];?></h3>
          <p style="color: Green">Descripcion: <?php echo $row['descripcion'];?> </p>
          <p style="color: Black">Domicilio: <?php echo $row['domicilio'];?> </p>
          <p style="color: Black">Telefono: <?php echo $row['telefono'];?></p>
          <p style="color: Black">Horarios: <?php echo $row['horarios'];?></p>
        </div>
        <div class="12u" style="text-align: right;" >
          <ul class="actions">
            <li>
              <a class="button special " style="background: gray; display:scroll; position:fixed; bottom:50px; right:35px;" href="update.php?idrestaurante=<?php echo $row['idrestaurante'];?>">Editar Perfil</a>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>
</body>
</html>