<?php
session_start();
$login = $_SESSION['login'];
$seguridad = $_SESSION['seguridad'];
  $idrestaurante=$_REQUEST['idrestaurante'];
   $nombrerest=$_POST['nombrerest'];
    $slogan=$_POST['slogan'];
     $descripcion=$_POST['descripcion'];
  $domicilio=$_POST['domicilio'];
    $telefono=$_POST['telefono'];
  $horarios=$_POST['horarios'];
  include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("UPDATE restaurante set nombrerest='$nombrerest',slogan='$slogan',descripcion='$descripcion', domicilio='$domicilio', telefono='$telefono',horarios='$horarios' where idrestaurante='$idrestaurante'", $link) or die(mysql_error());
if (!$sql){
  die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");
}else{
    echo  "<script type='text/javascript'>
      alert('Datos Actualizados');
      </script>";
     echo  "<script type='text/javascript'>
      window.location='../../view/perfil/read.php'
      </script>";
    mysql_close($link);
  }
?>