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
if (!isset($seguridad)) {
  echo "<SCRIPT TYPE='text/javascript'>alert('Sin acceso');</SCRIPT>";
  header('Location:../index.html');
}
$idrestaurante = $_SESSION['idrestaurante'];
include '../model/conexion.php';

$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("SELECT pedido.idpedido,pedido.tiposervicio,pedido.montototal,user.username
  FROM pedido,user WHERE pedido.idrestaurante ='$idrestaurante'
  AND pedido.idusuario = user.idusuario AND pedido.estado = 'Pendiente';", $link) or die(mysql_error());
$sql2 = mysql_query("SELECT pedido.idpedido,pedido.tiposervicio,pedido.montototal,user.username
  FROM pedido,user WHERE pedido.idrestaurante ='$idrestaurante'
  AND pedido.idusuario = user.idusuario AND pedido.estado = 'En proceso';", $link) or die(mysql_error());
$sql3 = mysql_query("SELECT pedido.idpedido,pedido.tiposervicio,pedido.montototal,user.username
  FROM pedido,user WHERE pedido.idrestaurante ='$idrestaurante'
  AND pedido.idusuario = user.idusuario AND pedido.estado = 'Terminado';", $link) or die(mysql_error());
echo '
    <div class="row">
      <div class="col s6  card-panel ">
        <h3 class="center-align">Pendientes</h3>
        <table class="centered striped bordered z-depth-3">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Tipo de servicio</th>
              <th>Monto total</th>
              <th>Ver Pedido Completo</th>
            </tr>
          </thead>

          <tbody>
            <tr>';
            while ($rows = mysql_fetch_array($sql)) {
              echo '
              <td>'.$rows['username'].'</td>
              <td>'.$rows['tiposervicio'].'</td>
              <td>'.$rows['montototal'].'</td>
              <td>
                <a  class="btn-floating waves-effect waves-light #2962ff blue accent-4"href="../controller/pedido/view.php?idpedido='.$rows['idpedido'].'"><i class="material-icons">visibility</i></a>
                <a  class="btn-floating waves-effect waves-light green"href="../controller/pedido/updateDoing.php?idpedido='.$rows['idpedido'].'"><i class="material-icons">done</i></a>
                <a  class="btn-floating waves-effect waves-light red"href="../controller/pedido/delete.php?idpedido='.$rows['idpedido'].'"><i class="material-icons">cancel</i></a>
              </td>
            </tr>';
          }
          echo '
          </tbody>
        </table class="centered striped bordered z-depth-3">
';
      echo '
      </div>';
      echo '
          <div class="row">
            <div class="col s6  card-panel ">
              <h3 class="center-align">Confirmados</h3>
              <table class="centered striped bordered z-depth-3">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Tipo de servicio</th>
                    <th>Monto total</th>
                    <th>Ver Pedido Completo</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>';
                  while ($rows = mysql_fetch_array($sql2)) {
                    echo '
                    <td>'.$rows['username'].'</td>
                    <td>'.$rows['tiposervicio'].'</td>
                    <td>'.$rows['montototal'].'</td>
                    <td>
                    <a  class="btn-floating waves-effect waves-light #2962ff blue accent-4"href="../controller/pedido/view.php?idpedido='.$rows['idpedido'].'"><i class="material-icons">visibility</i></a>
                      <a  class="btn-floating waves-effect waves-light green"href="../controller/pedido/updateDone.php?idpedido='.$rows['idpedido'].'"><i class="material-icons">done_all</i></a>
                    </td>
                  </tr>';
                }
                echo '
                </tbody>
              </table class="centered striped bordered z-depth-3">
      ';
      echo '
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <div class="col s10 offset-s1 card-panel ">
          <h3 class="center-align">Terminados</h3>
          <table class="centered striped bordered z-depth-3">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Tipo de servicio</th>
                <th>Monto total</th>
                  <th>Bye Bye</th>
              </tr>
            </thead>

            <tbody>
              <tr>';
              while ($rows = mysql_fetch_array($sql3)) {
                echo '
                <td>'.$rows['username'].'</td>
                <td>'.$rows['tiposervicio'].'</td>
                <td>'.$rows['montototal'].'</td>
                <td>
                <i class="material-icons">thumb_up</i>
                </td>
              </tr>';
            }echo '
            </tbody>
          </table>
        </div>
      </div>
    </div>
    ';
?>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</html>
