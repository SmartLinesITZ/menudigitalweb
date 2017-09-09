<?php
session_start();
$login = $_SESSION['login'];
$seguridad = $_SESSION['seguridad'];
  $idrestaurante=$_SESSION['idrestaurante'];
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Guardar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
  <style type="text/css">
    #logo{
      width: 9%;
      height: 100%;
    }
  </style>
</head>
<body class="grey lighten-2">
  <nav class="z-depth-2 #00695c teal darken-3" role="navigation">
    <div class="nav-wrapper container">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="../servicios.php"><i class="material-icons left">headset_mic</i>Servicios</a></li>
        <li><a href="../../platillos/read.php"><i class="material-icons left">restaurant_menu</i>Menu de platillos</a></li>
        <li><a href="../pedidos.php"><i class="material-icons left">room_service</i>Pedidos</a></li>
        <li><a href="../perfil/read.php"><i class="material-icons left">face</i>Perfil</a></li>
        <li><a href="../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>
  <form action="../../controller/platillos/newcategoria.php?idrestaurante=<?php echo $idrestaurante?>"  method="POST" enctype="ENCYPE">
  <div class="row">
      <div class="col s12">
   <div class="input-field col s5">
              <i class="material-icons prefix">dehaze</i>
              <input name="nomcategoria" type="text" class="validate">
              <label for="nomcategoria">Nueva Categoria</label>
            </div>
             <div class="input-field col s1">
            <button type="submit"></button>
            </div>
            </div>
            </div>
            </form>
  <form class="../../controller/platillos/altaplatillos.php"  method="post">
    <div class="row">
      <div class="col s12">
        <div class="col s6 offset-s3 card-panel ">
          <div class="col s12"><h3 class="center-align">Agregar Platillo</h3></div>
           <div class="row">
          <div class="row">
            <div class="col s6">
              <label>Cetgorira</label>
              <select class="browser-default" name="categoria">
                <option value="" disabled selected>Entra</option>
                <option value="1">Ensalada</option>
                <option value="2">Botana</option>
                <option value="3">Platillo fuerte</option>
              </select>
            </div> 
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">restaurant</i>
              <input name="nombreplatillo" id="nombre" type="text" class="validate">
              <label for="nombre">Nombre del platillos</label>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">$</i>
                <input id="precio" name="precio" type="text" class="validate">
                <label for="precio">Precio</label>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">short_text</i>
                  <textarea id="textarea1" name="descripcion" class="materialize-textarea"></textarea>
                  <label for="textarea1">Descripcion</label>
                </div>
              </div>
            </div>
            </div>
            <div class=" col s1 offset-s10">
              <button class="btn-floating btn-large  waves-effect waves-light blue" type="submit" href="../../controller/platillos/altaplatillo.php"><i class="material-icons">save</i></button> 
            </div>
          </div>
        </div>
        <div class="col s8 offset-s2  card-panel ">
          <div class="col s12"><h3 class="center-align">Menu</h3></div>
          <table class="centered responsive-table highlight">
            <thead>
              <tr>
                <th>Platillo</th>
                <th width="500px"></th>
                <th>Precio</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Pollo Gurmet</td>
                <td>........................................................................</td>
                <td>$75.00</td>
                <td>
                  <a class="btn-floating waves-effect waves-light red"><i class="material-icons">add</i></a>
                </td>
              </tr>
            </tbody>
          </div>
        </div>
      </div>
    </form>
  <div class="row">
      <div id="modal1" class="modal">
      <div class="modal-content">
       <div class="input-field col s5">
                <i class="material-icons prefix">dehaze</i>
                <input id="newcategoria" name="newcategoria" type="text" class="validate">
                <label for="newcategoria">Nueva Categoria</label>
              </div>
      </div>
      <div class="modal-footer">
        <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
  $( "#newcategoria" ).click(function() 
{
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal'.modal();
    $('#modal1').modal('open');
    });
</script>
  </html>
