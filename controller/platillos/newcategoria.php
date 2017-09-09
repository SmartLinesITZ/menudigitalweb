<?php
$idrestaurante=$_GET['idrestaurante'];
$nomcategoria=$_POST['nomcategoria'];
  include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("INSERT INTO categoria
    VALUES (null,'$nomcategoria','null','$idrestaurante')", $link) or die(mysql_error());
if (!$sql){
  die("<p>Fallo la insersion a la base de datos: ".mysql_error()."</p>");
  mysql_close($link);
}else{
    echo  "<script type='text/javascript'>
      alert('Categoria Agregada');
      </script>";
     echo  "<script type='text/javascript'>
      window.location='../../view/platillos/create.php'
      </script>";
    mysql_close($link);
  }
?>