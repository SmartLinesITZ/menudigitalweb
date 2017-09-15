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
$imagen = $_FILES['foto']['name'];
$tipo = $_FILES['foto']['type'];
$tamano = $_FILES['foto']['size'];
$ruta = "imagenes/" . $_FILES['foto']['name'];
include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($domicilio).'&sensor=false');
// Convertir el JSON en array.
$geo = json_decode($geo, true);
// Si todo esta bien
if ($geo['status'] = 'OK') {
	// Obtener los valores
	$latitud = $geo['results'][0]['geometry']['location']['lat'];
	$longitud = $geo['results'][0]['geometry']['location']['lng'];
}
$resultado = @move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);
if($resultado){
  $sql = mysql_query("UPDATE restaurante set nombrerest='$nombrerest',slogan='$slogan',descripcion='$descripcion', domicilio='$domicilio', telefono='$telefono',horarios='$horarios',logo='$imagen', latitud='$latitud', longitud='$longitud' where idrestaurante='$idrestaurante'", $link) or die(mysql_error());
  if (!$sql){
    die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");
  }else{
    echo  "<script type='text/javascript'>
    alert('Datos Actualizados');
  </script>";
  echo  "<script type='text/javascript'>
  window.location='../../view/perfil/read.php'
</script>";
      //echo "Latitud: ".$latitud." longitud: ".$longitud;
mysql_close($link);
}
}
?>
