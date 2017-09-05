<html>
<head>
  <title>Login</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../../src/assets/css/main.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="landing">
  <div id="page-wrapper">
    <header id="header" class="alt">
      <h1><a href="../inicio.html">Clic And Eat</a> </h1>
      <nav id="nav">
        <ul>
          <li><a href="../servicios.html"><i class="material-icons">headset_mic</i> Servicios</a></li>
          <li><a href="../platillos/read.html"><i class="material-icons">restaurant_menu</i>Menu de platillos</a></li>
          <li><a href="../pedidos.html"> <i class="material-icons">room_service</i> Pedidos</a></li>
          <li><a href="../perfil.html"> <i class="material-icons">face</i>Perfil</a></li>
          <li><a href="../../index.html" class="button">Cerrar Sesión</a></li>
        </ul>
      </nav>
    </header>
    <section id="banner">
      <section id="main" class="container 75%">
        <div class="box">
          <h2 style="color: black">Listado de  platillos</h2>
          <form class="" action="index.html" method="post">
            <div class="row">
              <div class="col s12">
                <div class="col s6 offset-s3 card-panel ">
                  <div class="col s12"><h3 class="center-align">Agregar Platillo</h3></div>
                  <div class="row">
                    <div class="col s6">
                      <label>Cetgorira</label>
                      <select class="browser-default">
                        <option value="" disabled selected>Entra</option>
                        <option value="1">Ensalada</option>
                        <option value="2">Botana</option>
                        <option value="3">Platillo fuerte</option>
                      </select>
                    </div>
                    <div class="12u">
                      ""
                      <input id="" name="usuario" type="text" value="" placeholder="Nombre del platillo">
                    </div>
                    <div class="12u">
                      ""
                      <input id="" name="usuario" type="number"  value="" placeholder="Precio">
                    </div>
                    <div class="12u">
                      ""
                      <textarea id=""  placeholder="Descripcion"></textarea>
                      ""
                    </div>
                    <div class="12u" style="text-align: right;" >
                      <ul class="actions">
                        <li>
                          <button class="button special" style="background: gray; ">Guardar</button>
                        </li>
                      </ul>
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
                          <a class=""><i class="material-icons">add</i></a>
                          <a class=""><i class="material-icons">cancel</i></a>
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </body>
  </html>
