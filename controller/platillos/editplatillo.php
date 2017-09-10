<?php
session_start();
$login = $_SESSION['login'];
$seguridad = $_SESSION['seguridad'];
  $idrestaurante=$_SESSION['idrestaurante'];
   $idplatillo=$_REQUEST['idplatillo'];
   $idcategoria=$_POST['idcategoria'];
    $nombreplatillo=$_POST['nombreplatillo'];
    $precio=$_POST['precio'];
    $descripcion=$_POST['descripcion'];
  include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$veidcategoria=mysql_query("SELECT idcategoria FROM categoria WHERE idcategoria='$idcategoria'", $link);
$rows = mysql_fetch_array($veidcategoria); 
$idcategoria=$rows['idcategoria']; 
$sql = mysql_query("UPDATE platillo set idcategoria='$idcategoria',nombreplatillo='$nombreplatillo', precio='$precio',descripcion='$descripcion' where idplatillo='$idplatillo'", $link) or die(mysql_error());
if (!$sql){
  die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");
}else{
    echo  "<script type='text/javascript'>
      alert('Datos Actualizados');
      </script>";
     echo  "<script type='text/javascript'>
      window.location='../../view/platillos/read.php'
      </script>";
    mysql_close($link);
  }
?>