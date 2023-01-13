<?php
  include"../conexiones/conexion.php";
  $consultae="SELECT * FROM empresa";
  $ejecutare=mysqli_query($con,$consultae);
  $filae=mysqli_fetch_array($ejecutare);
  $direccion=$filae['Direccion'];
  $telefono=$filae['Telefono'];
  $email=$filae['Email'];
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
    <link rel="stylesheet" href="../css/m.css">

    <title>COLCHONES LEON</title>
  </head>
<body class="foto2-nos">
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
          <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
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

    <nav class="navbar navbar-expand-lg navbar-light navegador " style="background-color: rgba(240,240,240,0.9);">
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

    <!--INICIO DE INICIAR SESION-->
    


    <!--INICIO DEL TEXTO 1--> <!--FILA-->
    <section class="texto1estilos-nos">

      <article>
        <div class="container">
          <div class="col-12">
            <p class="tit1-nos">SOBRE NOSOTROS</p>
            <P class="tit2-nos">CONOZCA QUIENES SOMOS</P>
          </div>
        </div>
      </article>

      <article class="container">
          <img src="img/41166775_265345424119699_4760405488753967104_n.jpg" alt="" style="width:100%;" class="img-fluid">
      </article>

      <article class="texto1-1-nosotros">
        <div class="container">
          <div class=" col-12">
            <p class="texto1caja1-nos">QUIENES SOMOS</p>
          </div>
        </div>
      </article>

      <article >
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <p class="texto2caja1-nos">Somos una empresa de carácter privado donde nos dedicamos a la fabricación, producción y comercialización de colchones.
              Nuestros productos están diseñados para brindar comodidad y buen descanso usando los mejores productos con los más altos estándares de calidad.
              Nuestra empresa entendemos que cada cliente es único y que requiere la mejor atención posible y así satisfacer sus necesidades.
              </p>
            </div>
          </div>
        </div>
      </article>
      <hr class="container" id="hr5">
      <article class="texto1-1-2nosotros">
        <div class="container">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <p class="texto5caja1-nos">NUESTRA MISION:</p>
          </div>
        </div>
      </article>
        
      <article class="texto1-2">
        <div class="container">
          <div class="row py-2">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <p class="texto2caja1-nos">El descanso es fundamental para mejorar nuestra actividad intelectual. El cerebro necesita varias horas de desconexión para procesar toda la información acumulada durante el día. </p>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 texto4caja1-nos">
              <img src="../img/paper-3309829_1920.jpg" alt="" height="210px" width="315" style="width:375px;height:250px;" class="img-fluid">
            </div>
          </div>
        </div>
      </article>

      
        <article class="texto1-1-2nosotros">
          <div class="container">
            <div class="row">

              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              </div>

              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p class="texto3caja1-nos">VISION:</p>
              </div>

            </div>
          </div>
        </article>

         <article class="texto1-3nosotros">
          <div class="container">
            <div class="row py-2">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 texto4caja1-nos">
                <img src="../img/paper-3249919_1920.jpg" alt="" height="210px" width="315" style="width:375px;height:250px;" class="img-fluid">
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p class="texto2caja1-nos">El descanso es fundamental para mejorar nuestra actividad intelectual. El cerebro necesita varias horas de desconexión para procesar toda la información acumulada durante el día. </p>
              </div>
            </div>
          </div>
        </article>
      <!--

      <hr class="container" id="hr1">

      <article class="texto1-3">
        <div class="container">
          <div class=" col-12 py-2 ">
            <p class="texto4caja1">Fabricamos y comercializamos una amplia gama de productos de alta calidad, precio justo y un excelente servicio, para satisfacer las necesidades y superar las expectativas de confort, descanso y bienestar.</p>
          </div>
        </div>
      </article>

      <hr id="hr2">

      <article class="texto1-4">
        <div class="container">
          <div class="row py-2">

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <i class="icon-price-tags fa-3x "></i>
              <p>LOS MEJORES PRECIOS Y <br>OFERTAS GARANTIZADAS.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <i class="icon-unlocked fa-3x"></i>
              <p>10 AÑOS DE EXPERIENCIA EN <br>LA FABRICACIÓN.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <i class="icon-clipboard fa-3x"></i>
              <p>COMPRAS FÁCILES Y 100% <br>SEGURAS.</p>
            </div>

          </div>
        </div>
      </article>
    -->

    </section>
    <!--FIN DEL TEXTO 1-->


    <!--INICIO DEL TEXTO 2-->

    <section class="iniciar-nos">
      <article>
        <div class="container">
          <div class="col-12 py-2">
            <div class="texto1caja2-nos">
              <p class="boton1-nos">Suscribete a nuestra plataforma</p>
              <p class="boton3-nos">Se parte de nuestra familia, suscríbete a nuestro boletín de noticias y recibe la información más reciente de nuestras ofertas y lanzamientos.</p>
              <form name="index" method="post" action="Iniciar sesion.php">
                <input class=" boton2-nos" type="submit" name="INICIAR SESION" value="INICIAR SESION" >
              </form>
            </div>
          </div>
        </div>      
      </article>
    </section>

<!--FIN DEL TEXTO 2-->


<!-- INICIO DEL TEXTO 5-->

  <section class="caja5">
    <article>
      <div class="container">
        <div class="row py-2">

          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 texto1caja5">
            <h3>Colchones leon</h3>
            <p>Telefono: (+57) <?php echo $telefono; ?></p>
            <p>E-mail: <?php echo $email; ?></p>
            <p>Direccion: <?php echo $direccion; ?></p>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 texto2caja5">
            <h3>Ubiquenos</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d994.193806876903!2d-74.16777647083774!3d4.634125599789608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9c2c7a6e8ccf%3A0x637b0e753d8d8995!2sCl.+40b+Sur+%2387-1%2C+Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1552337171148" width="315" height="210" frameborder="0" style="border:1px solid black" allowfullscreen></iframe>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 texto1caja5">
            <h3>Plataforma</h3>
              <div class="Plataforma">
                <p><a href="index.php">Inicio</a></p>
                <p><a href="">Comentarios</a></p>
                <p><a href="Iniciar sesion.php">Iniciar Sesion</a></p>
                <p><a href="">Ayuda</a></p>
              </div>
          </div>

        </div>
      </div>
    </article>
  </section>

<!--FIN DEL TEXTO 5-->
                        <!--
                          <div class="textoup"><h4>ÚLTIMOS PROYECTOS</h4></div>
                     
                            .textoup {
    color: rgb(255, 255, 255);
  }
                            <class="img-fluid" style="width:250px;height:250px;">-->
  
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
</body>
</html>