<?php
$nomcategoria=$_POST['nomcategoria'];
  $nombreplatillo=$_POST['nombreplatillo'];
  $precio=$_POST['precio'];
  $descripcion=$_POST['descripcion'];
  include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$veidcategoria=mysql_query("SELECT idcategoria FROM categoria WHERE nomcategoria='$nomcategoria'", $link);
$rows = mysql_fetch_array($veidcategoria); 
$idcategoria=$rows['idcategoria']; 
 //$imagen = $_FILES['imagen']['name'];
  //  $tipo = $_FILES['imagen']['type'];
  //  $tamano = $_FILES['imagen']['size'];
//$ruta = "imagenes/" . $_FILES['imagen']['name'];
 // $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
//if($resultado){
$sql = mysql_query("INSERT INTO platillo
    VALUES (null,'$nombreplatillo','null','$precio','$descripcion','$idcategoria')", $link) or die(mysql_error());
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
//}
?>