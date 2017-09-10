
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="5" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title></title>

</head>
<body class="grey lighten-2">
  <nav class="z-depth-2 #00695c teal darken-3" role="navigation">
    <div class="nav-wrapper container">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="servicios.php"><i class="material-icons left">headset_mic</i>Servicios</a></li>
        <li><a href="platillos/read.php"><i class="material-icons left">restaurant_menu</i>Menu de platillos</a></li>
        <li><a href="pedidos.php"><i class="material-icons left">room_service</i>Pedidos</a></li>
        <li><a href="perfil/read.php"><i class="material-icons left">face</i>Perfil</a></li>
        <li><a href="../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>
    <?php
    session_start();
    $login = $_SESSION['login'];
    $seguridad = $_SESSION['seguridad'];
    $idpedido=$_REQUEST['idpedido'];
    include "../../model/conexion.php";
    $objConex = new Conexion();
    $link=$objConex->conectarse();
    $sql = mysql_query("SELECT platillo.nombreplatillo,platillo.precio,platillo.imagen,platillo.descripcion FROM platillo,orden where orden.idpedido='$idpedido' AND orden.idplatillo=platillo.idplatillo", $link) or die(mysql_error());
    $sql2 = mysql_query("SELECT user.username
      FROM pedido,user WHERE idpedido ='$idpedido';", $link) or die(mysql_error());
      $nombre=mysql_fetch_array($sql2);
    echo '
        <div class="row">
          <div class="col s8 offset-s2  card-panel ">
            <h3 class="center-align">Pedio de '.$nombre['username'].'</h3>
            <table class="centered striped bordered z-depth-3">
              <thead>
                <tr>
                  <th>Platillo</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                </tr>
              </thead>

              <tbody>
                <tr>';
                while ($rows = mysql_fetch_array($sql)) {
                  echo '
                  <td>'.$rows['imagen'].'</td>
                  <td>'.$rows['nombreplatillo'].'</td>
                  <td>'.$rows['descripcion'].'</td>
                  <td>'.$rows['precio'].'</td>
                </tr>';
              }
              echo '
              </tbody>
            </table class="centered striped bordered z-depth-3">
            ';
          echo '

          </div>
          <div class="floating col s1 offset-s10">
            <a  class="btn-floating btn-large waves-effect waves-light bkue" href="../../view/pedidos.php"><i class="material-icons">check_circle</i></a>
          </div>

  </body>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

</html>
';
?>
