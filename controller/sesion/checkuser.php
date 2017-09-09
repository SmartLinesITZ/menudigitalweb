<?php
	$user=$_POST['usuario'];
	$password=$_POST['password'];
	include "../../model/conexion.php";
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	session_start();
	$encrypt=md5($password);
	$sql = mysql_query("SELECT * FROM user,usuarios,restaurante WHERE username='" .$user. "' AND password='".$encrypt."' AND user.idusuario=usuarios.idusuario AND restaurante.idrestaurante=usuarios.idrestaurante;" , $link) or die(mysql_error());
	$numrow=mysql_num_rows($sql);
	if ($numrow == 0){
			echo 	"<script type='text/javascript'>
					alert('Acceso incorrecto');
					</script>";
			echo 	"<script type='text/javascript'>
					window.location='../../index.html'
					</script>";
	}else{
		while ($rows = mysql_fetch_array($sql)){
			$_SESSION['login'] = $rows['username'];
			$_SESSION['contra'] = $rows['password'];
			$_SESSION['idrestaurante'] = $rows['idrestaurante'];
			$_SESSION['seguridad'] = "ok";
			$tipousuario=$rows['tipousuario'];
		}
		if($tipousuario=='restaurante'){
			echo "<script type='text/javascript'>
				alert('Bienvenido " .$_SESSION['login']. "');
				</script>";
				echo "<script type='text/javascript'>
				window.location='../../view/inicio.php'
				</script>";
		}else{
			echo 	"<script type='text/javascript'>
					alert('Acceso incorrecto');
					</script>";
			echo 	"<script type='text/javascript'>
					window.location='../../index.html'
					</script>";
		}
		
	}
	mysql_close($link);

?>