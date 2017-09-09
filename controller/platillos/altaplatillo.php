<?php
$categoria=$_POST['categoria'];
  $nombreplatillo=$_POST['nombreplatillo'];
  $precio=$_POST['precio'];
  $descripcion=$_POST['descripcion'];
  include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("INSERT INTO platillo,categoria
    VALUES (null,'$categoria','$nombreplatillo','$precio','$descripcion')", $link) or die(mysql_error());
if (!$sql){
  die("<p>Fallo la insersion a la base de datos: ".mysql_error()."</p>");
  mysql_close($link);
}else{
    echo  "<script type='text/javascript'>
      alert('Datos guardados');
      </script>";
     echo  "<script type='text/javascript'>
      window.location='../../view/platillos/read.php'
      </script>";
    mysql_close($link);
  }
?>