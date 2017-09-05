<?php  
$nombreRestaurante=$_POST['nombre'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$noCuenta=$_POST['nocuenta'];
$nameuser=$_POST['nameuser'];
$password=$_POST['password'];
include "model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
registroRestaurante($nombreRestaurante,$correo,$telefono,$noCuenta,$nameuser,$password,$link);
function registroRestaurante($nombreRestaurante,$correo,$telefono,$noCuenta,$nameuser,$password,$link){
	$encrypt=md5($password);
	$insertaRestaurante=mysql_query("INSERT INTO restaurante VALUES (null,'$nombreRestaurante','','','$telefono','','','','','')", $link) or die(mysql_error());
	$query = mysql_query("SELECT * FROM restaurante WHERE nombrerest='$nombreRestaurante'", $link) or die(mysql_error());
	$row=mysql_fetch_array($query);
	$idRestaurante=$row['idrestaurante'];
	$insertaUser = mysql_query("INSERT INTO user VALUES (null,'$nameuser','$encrypt')", $link)or die(mysql_error());
	$queryUser = mysql_query("SELECT * FROM user WHERE username='$nameuser' ORDER BY idusuario DESC", $link) or die(mysql_error());
	$row1=mysql_fetch_array($queryUser);
	$idUsuario=$row1['idusuario'];
	$insertaUsuario = mysql_query("INSERT INTO usuarios VALUES ($idUsuario,'$correo','NULL','NULL','$noCuenta','restaurante',$idRestaurante)", $link)or die(mysql_error());
	
		echo 	"<script type='text/javascript'>
			alert('Registro con éxito');
			</script>";

		echo 	"<script type='text/javascript'>
			window.location='view/inicio.php';
			</script>";
	
}
?>