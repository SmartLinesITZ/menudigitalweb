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
    #newCat{
      margin-top:20px;
    }
    #formulario{
      margin-top: 40px;
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
  <div id="formulario">
  <form action="../../controller/platillos/altaplatillo.php"  method="POST" enctype="multipart/form-data">
      <div class="row col s12">
        <div class="col s6 offset-s3 card-panel ">
          <div class="col s12">
            <h3 class="center-align">Agregar Platillo</h3>
          </div>
          <div class="row">
            <div class="col s6">
              <label>Cetegoria</label>
              <select class="browser-default" name="nomcategoria">
                <option value="" selected="selected">Elegir</option>
                <?php   
                include "../../model/conexion.php";
                $objConex = new Conexion();
                $link=$objConex->conectarse();
                $sql = mysql_query("SELECT nomcategoria from categoria where categoria.idrestaurante='$idrestaurante';" , $link) or die(mysql_error());                
                while ($rows = mysql_fetch_array($sql)){   
                  ?>
                  <option value="<?php echo $rows['nomcategoria']; ?>"><?php echo $rows['nomcategoria']; ?></option>
                  <?php
                }
                ?></select>
              </div> 
              <div class="col s6">
                <a class="btn-floating btn-small  waves-effect waves-light blue" id="newCat" href="#modal1"> <i class="material-icons">add</i>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">restaurant</i>
                <input name="nombreplatillo" type="text" class="validate">
                <label for="nombre">Nombre del platillos</label>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">$</i>
                <input name="precio" type="text" class="validate">
                <label for="precio">Precio</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">short_text</i>
                <textarea name="descripcion" class="materialize-textarea"></textarea>
                <label for="textarea1">Descripcion</label>
              </div>
              <div class="row">
                <div class="input-field col s9">
                  <i class="material-icons prefix">add_a_photo</i>
                  <input name="foto" id="imagen" type="file" class="validate" class="filestyle" data-input="false">
                </div>
                <div class=" col s3">
                  <button class="waves-effect waves-light btn #00695c teal darken-3" type="submit">
                   Guardar
                 </button> 
               </div>
             </div>
           </div>
         </div>
       </div>
     </form>
   </div>
   <div class="row col s5">
    <div id="modal1" class="modal">
      <div class="modal-content">
        <form action="../../controller/platillos/newcategoria.php?idrestaurante=<?php echo $idrestaurante?>"  method="POST" enctype="ENCYPE">
         <div class="input-field col s9">
          <i class="material-icons prefix">filter_none</i>
          <input name="nomcategoria" type="text" class="validate">
          <label for="nomcategoria">Nueva Categoria</label>
        </div>
        <div class="input-field col s3">
          <button type="submit" class="waves-effect waves-light btn #00695c teal darken-3">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
 $('#newCat').click(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    $('#modal1').modal('open');
  });
</script>
</html>
