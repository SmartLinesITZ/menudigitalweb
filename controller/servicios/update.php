<?php
session_start();
$login = $_SESSION['login'];
$seguridad = $_SESSION['seguridad'];
$reservacion=$_REQUEST['reservacion'];
$pedidoa=$_REQUEST['pedidoa'];
$pedidod=$_REQUEST['pedidod'];

  include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("UPDATE restaurante set nombrerest='$nombrerest',slogan='$slogan',descripcion='$descripcion', domicilio='$domicilio', telefono='$telefono',horarios='$horarios', latitud='$latitud', longitud='$longitud' where idrestaurante='$idrestaurante'", $link) or die(mysql_error());
if (!$sql){
  die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");
}else{
     echo  "<script type='text/javascript'>
      window.location='../../view/perfil/read.php'
      </script>";
      //echo "Latitud: ".$latitud." longitud: ".$longitud;
    mysql_close($link);
  }
?>
