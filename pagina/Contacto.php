<?php 
  include("../conexiones/conexion.php");
  $consulta="SELECT * FROM empresa";
  $ejecutar=mysqli_query($con,$consulta);
  $fila=mysqli_fetch_array($ejecutar);
  $direccion=$fila['Direccion'];
  $telefono=$fila['Telefono'];
  $email=$fila['Email'];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilosproyecto.css"> 
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">

    <title>COLCHONES LEON</title>
  </head>
<body class="foto1-ini">
  <!--TITULO Y LOGO INICIO-->
    <header id="primero">
      <div class="container">
        <div class="row py-2">

          <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4  text-center">
            <a href=""><img src="../img/LOGO.jpg" alt="" height="180" width="180" class="img-fluid my-auto"></a>
            
          </div>
          <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 text-center">
            <h1 id="tit1">COLCHONES LEON</h1>
            <h6 id="tit2">"LO SALVAJE Y LA COMODIDAD SE SIENTE"</h6>
            
          </div>
          <div class="col-xs-0 col-sm-1 col-md-1 col-lg-1">
            <div class="social2">
              <ul>
                <li><a href="https://www.facebook.com/yerson.leon.334" target="_blank" class="icon-facebook"></a></li>
                <li><a href="" target="_blank" class="icon-instagram"></a></li>
                <li><a href="mailto:colchonesleon@gmail.com"  class="icon-google"></a></li>
                <li><a href="" target="_blank" class="icon-twitter"></a></li>
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </header>
      <!--TITULO Y LOGO INICIO-->

    <!--INICIO DE NAVEGADOR 2-->

    <nav class="navbar navbar-expand-lg navbar-light navegador" style="background-color: rgba(240,240,240,0.9);">
      <div class="container">
          <i class="fa fa-home mx-5 fa-2x " aria-hidden="true" style="color: black"></i>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse col-xs-12 col-sm-12 col-md-12 col-lg-10" id="menuprincipal">
            <ul class="nav navbar-nav">
              <li class="nav-item active my-2"><a class="nav-link" href="index.php"><b>INICIO</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="Nosotros.php"><b>NOSOTROS</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="Productos.php"><b>PRODUCTOS</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="Contacto.php"><b>CONTACTO</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="Puntos de Venta.php"><b>PUNTOS DE VENTA</b></a></li>
            </ul>
          </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
              <form name="index" method="post" action="Iniciar sesion.php">
                <input class=" boton3-ini_2" type="submit" name="Iniciar Sesión" value="Iniciar Sesión" >
              </form>

            </div>
      </div>
      
    </nav>

    <!--FIN DE NAVEGADOR 2-->

    <!--INICIO IMAGEN-->
    <div class="row color_contactenos">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="d-flex justify-content-center imagen_contactenos">
          <p>VISITENOS</p>
        </div>
        <div class="d-flex justify-content-center">
          <img src="img/keyboard-453795_1920.jpg" style="width: 90%;">
        </div>
      </div>
    </div>
  <!--FIN DE IMAGEN-->


    <!--INICIO DEL TEXTO 1--> <!--FILA-->

    <!--Contacto-->
    <section class="texto1estilos">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <p class="titulo_comentanos">CONTACTENOS</p>
            <form name="form" method="post" action="" enctype="multipart/form-data">
              <div class="row py-2">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h6 class="texto_comentario">NOMBRE</h6>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <input style="background: rgb(245,245,245); border: 1px solid #717171;" type="text" name="nombre" required>
                </div>

              </div>

              <div class="row py-2">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h6 class="texto_comentario">EMAIL</h6>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <input style="background: rgb(245,245,245); border: 1px solid #717171;" type="email" name="email" required>
                </div>

              </div>
              <div class="row py-2">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h6 class="texto_comentario">MENSAJE</h6>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <textarea style="background: rgb(245,245,245); border: 1px solid #717171;" name="txtCaracteristicas" cols="55" rows="6"  required></textarea>
                  <form action="cgi-bin/control.exe" method="post" enctype="text/plain" name="miform"> 
                </div>

              </div>
              <div class="row py-4">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <input class=enviar_comentario type="submit" name="enviar" value="Enviar">
                </div>
              </div>
            </form>
          </div>


          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="row py-2">

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="titulo_comentanos">MAS INFORMACION</p>
              </div>
              <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                <p class="texto_mas_informacion"> Si desea visitarnos o para obtener mayor informacion a cerca de nuestros servicios, llamenos o por favor registre sus datos en el formulario.</p>
              </div>

            </div>
            <div class="row py-2">

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    <img src="img/direccion.png" widht="20" height="20">
                  </div>
                  <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                    <p class="texto_mas_informacion"><?php echo $direccion; ?></p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                <div class="row">
                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                      <img src="img/450_1000.png" widht="20" height="20">
                  </div>
                  <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                    <p class="texto_mas_informacion"><?php echo $email; ?></p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                <div class="row">
                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    <img src="img/wasap-web-300x250-1.png" widht="20" height="20">
                  </div>
                  <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                    <p class="texto_mas_informacion"><?php echo $telefono; ?></p>
                  </div>
                </div>
              </div>


            </div>
            <div class="row py-2">

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="texto_mas_informacion"><b>SIGUENOS EN:</b></p>
              </div>
              <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                <div class="row">
                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    <a href="https://www.facebook.com/yerson.leon.334" target="_blank">
                    <img src="img/fb_icon_325x325.png" widht="20" height="20">
                    </a>
                  </div>
                  <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                    <p class="texto_mas_informacion"><a href="https://www.facebook.com/yerson.leon.334" style="text-decoration: none; color: #545454;" target="_blank">Colchones Leon</a></p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!--fin contacto-->



    <section class="texto1estilos">

      <article class="texto1-1">
        <div class="container">
          <div class=" col-12">
            <p class="titulo_encuentranos">ENCUENTRENOS EN EL MAPA</p>
          </div>
        </div>
      </article>
        
      <article>
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="d-flex justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d994.1938049967948!2d-74.16777647083782!3d4.6341269365104365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9c2c7a6e8ccf%3A0x637b0e753d8d8995!2sCl.+40b+Sur+%2387-1%2C+Bogot%C3%A1%2C+Colombia!5e0!3m2!1ses!2snl!4v1552341476292" width="900" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </article>

    </section>
    <!--FIN DEL TEXTO 1-->



    <!--INICIO DEL TEXTO 2-->    

    <div class="texto1estilos">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="titulo_horario">HORARIO DE APERTURA</p>
          </div>
        </div>
        <div class="row py-2">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="texto_mas_informacion2">Lun-Vier: 7am-10pm</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="texto_mas_informacion2">Sabados: 8am-10pm</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="texto_mas_informacion2">Domingos: 8am-11pm</p>
          </div>
        </div>
      </div>
    </div>

    <!--FIN DEL TEXTO 2-->

    <!--INICIO DEL TEXTO 3-->    

    <div class="texto1estilos">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="titulo_horario">NUESTRA DIRECCION</p>
          </div>
        </div>
        <div class="row py-2">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="texto_mas_informacion2"><?php echo $direccion; ?></p>
          </div>
        </div>
      </div>
    </div>

    <!--FIN DEL TEXTO 3-->

<!--INICIO PIE DE PAGINA-->

<footer class="centrarCaja8 text-center">
  <div class="container">
    <div class="row py-2">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p><div class="textofeed"><h6>Copyright 2018 © Todos los derechos reservados - COLCHONES LEON -</h6></div></p>
      </div>
    </div>
  </div>
</footer>

<!--FIN PIE DE PAGINA-->

    <!-- Optional JavaScript -->  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/fontawesome-all.js"></script>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script> 
  </body>
</html> 