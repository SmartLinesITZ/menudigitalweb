<?php
$idplatillo=$_REQUEST['idplatillo'];
  include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("DELETE FROM platillo WHERE idplatillo='$idplatillo'", $link) or die(mysql_error());
if (!$sql){
  die("<p>Fallo la eliminación de datos".mysql_error()."</p>");
  mysql_close($link);
}else{
    echo  "<script type='text/javascript'>
      alert('Datos Eliminados Correctamente');
      </script>";
     echo  "<script type='text/javascript'>
      window.location='../../view/platillos/read.php'
      </script>";
    mysql_close($link);
  }
?>