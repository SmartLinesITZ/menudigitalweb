<?php
session_start();
$login = $_SESSION['login'];
$seguridad = $_SESSION['seguridad'];
$idpedido=$_REQUEST['idpedido'];

include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("UPDATE pedido set estado='En proceso' where idpedido='$idpedido'", $link) or die(mysql_error());
if (!$sql){
  die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");
}else{
     echo  "<script type='text/javascript'>
      window.location='../../view/pedidos.php'
      </script>";
    mysql_close($link);
  }
?>
