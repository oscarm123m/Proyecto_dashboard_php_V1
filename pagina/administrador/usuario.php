<?php
  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../Iniciar sesion.php');
  }
  include"../../conexiones/conexion.php";

  if($_SESSION['rol']==1){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/estilosproyecto.css"> 
    <link rel="stylesheet" href="../../css/font-awesome.min.css"> 
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../css/m.css">

    <title>COLCHONES LEON</title>
  </head>
<body class="foto1-ini">
  <!--TITULO Y LOGO INICIO-->
    <header id="primero">
      <div class="container">
        <div class="row py-2">

          <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4  text-center">
            <a href=""><img src="../../img/LOGO.jpg" alt="" height="180" width="180" class="img-fluid my-auto"></a>
            
          </div>
          <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 text-center">
            <h1 id="tit1">COLCHONES LEON</h1>
            <h6 id="tit2">"LO SALVAJE Y LA COMODIDAD SE SIENTE"</h6>
            
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

          <div class="collapse navbar-collapse col-xs-12 col-sm-12 col-md-12 col-lg-8" id="menuprincipal">
            <ul class="nav navbar-nav">
              <li class="nav-item active my-2"><a class="nav-link" href="index.php"><b>INICIO</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="ventas.php"><b>VENTAS</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="usuario.php"><b>USUARIOS</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="productos.php"><b>PRODUCTOS</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="promociones.php"><b>PROMOCIONES</b></a></li>
            </ul>
          </div>
        
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">

            <div class="btn-group">
              <button type="button" class="" style="font-size: 15px;"><?php echo $_SESSION['user']; ?></button>
              <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="" class="dropdown-item" type="button">Configuracion</a>
                <a href="../salir.php" class="dropdown-item" type="button">Cerrar Sesion</a>
              </div>

          </div>
      </div>
      
    </nav>

    <!--FIN INICIO DE NAVEGADOR 2-->

    <!--INICIO DEL CAROUSEL DE IMAGENES-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../img/bed-881120_1280.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>wrhgdethrsvdcs</h5>
            <p>qerwjeythd</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../img/bedroom-690129_1280.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../img/interior-3538020_1280.jpg" alt="Third slide">
        </div>
      </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
  <!--FIN DEL CAROUSEL DE IMAGENES-->


    <!--INICIO DEL TEXTO 1--> <!--FILA-->
    <section class="texto1estilos">

      <article class="texto1-1">
        <div class="container">
          <div class=" col-12 py-2 ">
            <p class="texto1caja1">LA COMODIDAD DE UN BUEN DESCANSO</p>
          </div>
        </div>
      </article>
        
      <article class="texto1-2">
        <div class="container">
          <div class="row py-2">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <p class="texto2caja1">El descanso es fundamental para mejorar nuestra actividad intelectual. El cerebro necesita varias horas de desconexión para procesar toda la información acumulada durante el día. </p>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 texto3caja1">
              <img src="../img/woman-2197947_1920.jpg" alt="" height="210px" width="315" style="width:315px;height:210px;" class="img-fluid">
            </div>
          </div>
        </div>
      </article>

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

    </section>
    <!--FIN DEL TEXTO 1-->


    <!--INICIO DEL TEXTO 2-->

    <section>
      <article>
        <div class="container">
          <div class="col-12 py-2">
            <div class="texto1caja2">
              <form name="Productos" method="post" action="Productos.php">
                <input class="boton2-nos1" type="submit" name="VER PRODUCTOS" value="VER PRODUCTOS">
              </form>
            </div>
          </div>
        </div>      
      </article>
    </section>

<!--FIN DEL TEXTO 2-->

<!--INICIO DEL TEXTO 3-->
  <section class="caja3">
    <br>
    <div class="container">
      <div class="texto3cuadro">
        <article>
          <div class="container">
            <div class="col-12 py-2">
              <p class="texto1caja3">LINEA DE PRODUCTOS</p>
            </div>
          </div>  
        </article>

        <article>
          <div class="container">
            <div class="row py-2">

              <?php

                $consulta="SELECT * FROM tipoweb ORDER BY IdTipoWeb ASC";
                $ejecutar=mysqli_query($con,$consulta);
                $i=0;
                while ($fila=mysqli_fetch_array($ejecutar)) {
                  $nombre=$fila['NombreT'];
                  $descripcion=$fila['Descripcion'];
                  if ($fila['Imagen']) {
                    $foto='img/'.$fila['Imagen'];
                  }
                  
                

              ?>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 texto2caja3">
                <div class="card " style="width: 18rem;">
                  <img class="card-img-top" style="width: 236px; height: 236px;" src="<?php echo $foto; ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><b><?php echo $nombre; ?></b></h5>
                    <p class="card-text"><?php echo $descripcion; ?></p>
                    <form class="" name="" method="post" action="productos.php">
                      <input class="ver_producto" type="submit" name="Ver productos" value="ver productos">
                    </form>
                  </div>
                </div>
              </div>

              <?php
                }
              ?>


            </div>
          </div>
        </article>
      </div>
    </div>

    <article>
      <div class="container">
        <div class=" row py-2">
          
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <h5 class="texto5caja3">ALMOHADAS</h5>
            <p class="texto6caja3">Tu postura cambia en la noche, y es vital darle un buen sustento a cuello y cabeza. Por eso para complementar el descanso es vital tener almohadas acordes a tu forma de dormir que se adapten a tu anatomía. Tenemos una gran variedad para que elijas la mejor y tengas dulces sueños.</p>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <h5 class="texto5caja3">ROPA DE CAMA</h5>
            <p class="texto6caja3">El colchón no es lo único en lo que deben pensar para un descanso reconfortante. Edredones, sábanas y ropa de cama hacen parte de un confort inigualable pensando en el tacto, la temperatura y el buen descanso. Además protectores de colchón para darle una vida útil más larga con propiedades anti ácaros entre otros.</p>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <h5 class="texto5caja3">BASE CAMAS</h5>
            <p class="texto6caja3">El mueble donde reposa tu colchón es importante para complementar el descanso. Tenemos base camas y somieres ajustables de diferentes medidas para dar un estilo a tu habitación único y estabilidad en tu sueño. Creados para prolongar la vida de tu colchón y dar armonía a tu cuarto.</p>
          </div>

        </div>
      </div>
    </article>
  </section>
<!--FIN DEL TEXTO 3-->

<!--INICIO DEL TEXTO 4-->

    <section>
      <article>
        <div class="container">
          <div class="col-12 py-2">
            <div class="texto1caja2">
              <form name="Productos" method="post" action="Productos.php">
                <input class="boton2-nos1" type="submit" name="VER PRODUCTOS" value="VER PRODUCTOS">
              </form>
            </div>
          </div>
        </div>      
      </article>
    </section>

<!--FIN DEL TEXTO 4-->
  
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
    <script src="../../js/fontawesome-all.js"></script>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script> 
  </body>
</html> 


<?php }else{
  header('location: ../salir.php');
} ?>