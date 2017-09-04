<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Empresa</title>
	
	<link rel="stylesheet" href="../src/assets/css/materialize.css" />
	<link rel="stylesheet" href="../src/assets/css/main.css" />
	
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
		#logo{
			width: 9%;
			height: 100%;
		}
	</style>
</head>
<body class="grey lighten-2">
	<header id="header" class="alt">
	      <h1><a href="index.html">Clic And Eat</a> </h1>
	      <nav id="nav">
		        <ul>
			          <li><a href="servicios.html"><i class="material-icons">headset_mic</i> Servicios</a></li>
			          <li><a href="platillos/read.html"><i class="material-icons">restaurant_menu</i>Menu de platillos</a></li>
			          <li><a href="pedidos.html"> <i class="material-icons">room_service</i> Pedidos</a></li>
			          <li><a href="perfil.html"> <i class="material-icons">face</i>Perfil</a></li>
			          <li><a href="../index.html" class="button">Cerrar Sesión</a></li>
		        </ul>
	      </nav>
     </header>


	 <section id="banner" style="padding-right: 2em; padding-left: 2em;">
        <section id="main" class="containerAddRest" >
        	<div class="box">
				<ul style="color: black; text-align: left;" class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header"> Reservaciones
							<span class="badge">
							<div class="switch">
								<label>
									Off
									<input type="checkbox">
									<span class="lever"></span>
									On
								</label>
							</div>
							</span>
						</div>
						<div class="collapsible-body">
							<p>
								Cuentas con servicio de resarvación. Habilita la opcion de ON para que tus clientes puedas ver y hacer resevacion por medio de la app.
							</p>
						</div>
					</li>
					<li>
						<div class="collapsible-header"> Pedido anticipado
							<span class="badge">
								<div class="switch">
									<label>
										Off
										<input type="checkbox">
										<span class="lever"></span>
										On
									</label>
								</div>
							</span>
						</div>
						<div class="collapsible-body"><p></p></div>
					</li>
					<li>
						<div class="collapsible-header"><span class="badge"><div class="switch">
							<label>
								Off
								<input type="checkbox">
								<span class="lever"></span>
								On
							</label>
						</div></span>Pedido a domicilio</div>
						<div class="collapsible-body"><p>Descripcion d eun pedido a domicilio.</p></div>
					</li>
				</ul>
			</div>
		</section>
	</section>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	</body>
	</html>
