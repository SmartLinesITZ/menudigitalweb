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
            <button type="submit">Guardar</button>
            </div>
            </div>
            </div>
            </form>
  <form action="../../controller/platillos/altaplatillo.php"  method="post">
    <div class="row">
      <div class="col s12">
        <div class="col s6 offset-s3 card-panel ">
          <div class="col s12"><h3 class="center-align">Agregar Platillo</h3></div>
           <div class="row">
          <div class="row">
            <div class="col s6">
              <label>Cetgorira</label>
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
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">restaurant</i>
              <input name="nombreplatillo" type="text" class="validate">
              <label for="nombre">Nombre del platillos</label>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">$</i>
                <input name="precio" type="text" class="validate">
                <label for="precio">Precio</label>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">short_text</i>
                  <textarea name="descripcion" class="materialize-textarea"></textarea>
                  <label for="textarea1">Descripcion</label>
                </div>
              </div>
             <div class="input-field col s6">
                <i class="material-icons prefix">add_a_photo</i>
                <input name="imagen" id="imagen" type="file" class="validate">
                <label for="imagen"></label>
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
    <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-12 ">
   <?php $i=1; while ($imagenes = @mysql_fetch_array($sql) ){ 
   $ruta = "imagenes/" . $imagenes['imagen'];
   ?>  
  <div class="col-md-3 col-xs-10">
    <img src="<?php echo $ruta;?>" style="width:100%" onclick="openModal();currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor">
  </div>
  <?php
  $i++; 
  }
  ?>
  </div>
  </div>
</div>
 <div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
  <?php  $j=1; while ($imagenes = @mysql_fetch_array($sql2) ){
   $ruta = "imagenes/" . $imagenes['imagen'];
   ?>  
    <div class="mySlides">
      <div class="numbertext"><?php echo $j;?></div>
      <img src="<?php echo $ruta;?>" style="width:100%" >
    </div>
  <?php
  $j=$j+1;
   }?>
   </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
 </div>
</body>
<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}</script>
  </html>
