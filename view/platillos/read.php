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
$sql = mysql_query("SELECT platillo.nombreplatillo,platillo.precio,platillo.descripcion,platillo.idplatillo FROM platillo,categoria
    WHERE categoria.idrestaurante = '$idrestaurante' AND categoria.idcategoria=platillo.idcategoria;" , $link) or die(mysql_error());
$rows=mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="../../src/js/eliminarplatillo.js"></script>
	<title></title>
	<style type="text/css">
		#logo{
			width: 9%;
			height: 100%;
		}
	</style>
</head>
<body class="grey lighten-2">
	<nav class="z-depth-2 #00695c teal darken-3" role="navigation">
		<div class="nav-wrapper container">
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="../servicios.php"><i class="material-icons left">headset_mic</i>Servicios</a></li>
				<li><a href="../platillos/read.php"><i class="material-icons left">restaurant_menu</i>Menu de platillos</a></li>
				<li><a href="../pedidos.php"><i class="material-icons left">room_service</i>Pedidos</a></li>
				<li><a href="../perfil/read.php"><i class="material-icons left">face</i>Perfil</a></li>
				<li><a href="../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
			</ul>
		</div>
	</nav>
	<form class="" action="index.html" method="post">
		<div class="row">
			<div class="col s12">
				<div class="col s10 offset-s1 card-panel ">
					<div class="big-padding text-center black-text">
						<div class="center-align">
							<h1>Listado de  platillos</h1>
						</div>
					</div>
					<div class="right-align">
					</div>
					<div class="row">
						<table class="ccentered striped bordered z-depth-3">
							<thead>
								<tr>
									<th>Platillo</th>
									<th width="500px">Descripción</th>
									<th>Precio</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody>
								<?php
   while ($rows = mysql_fetch_array($sql)){
   ?>
    <tr align="center">
      <td><?php echo $rows['nombreplatillo']?></td>
      <td><?php echo $rows['descripcion']?></td>
      <td><?php echo $rows['precio']?></td>
       <td align="center"><a  class="btn-floating btn-Tiny waves-effect waves-light bkue" href="update.php?idplatillo=<?php echo $rows['idplatillo']?>"><i class="material-icons">edit</i></a>
       <a  class="btn-floating btn-Tiny waves-effect waves-light red" href="../../controller/platillos/deleteplatillo.php?idplatillo=<?php echo $rows['idplatillo']?>" onclick="return elimplatillo();"><i class="material-icons">remove</i></a></td>
      </tr>
      <?php
      }
      ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="floating s1 offset-s10">
			<a  class="btn-floating btn-large waves-effect waves-light bkue" href="create.php"><i class="material-icons">add</i></a>
		</div>
	</body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	</html>
