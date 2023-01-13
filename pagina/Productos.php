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

    <!--INICIO DEL CAROUSEL DE IMAGENES-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/Simmons-1660x576.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Simmons-1660x576.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Simmons-1660x576.jpg" alt="First slide">
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
            <p class="texto1caja1">NUESTROS PRODUCTOS</p>
          </div>
        </div>
      </article>


      <!--------------------------->


    <div class="container">
      <div id="accordion">


        <?php
          $consulta2="SELECT * FROM promocion WHERE Estado='Activo' ORDER BY Estado ASC";
          $ejecutar2=mysqli_query($con,$consulta2);
          $contar=mysqli_fetch_row($ejecutar2);
          $i=0;

          if ($contar>0) {
            
          ?>

          <div class="card1">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <p class="titulo_productos">Combos</p>
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <div class="row py-2">
                  <?php
                    $consulta3="SELECT * FROM promocion WHERE Estado='Activo'";
                    $ejecutar3=mysqli_query($con,$consulta3);
                    $inn=0;
                    while ($fila3=mysqli_fetch_array($ejecutar3)) {
                      
                      $idpromocion=$fila3['IdPromocion'];
                      $nombrepw=$fila3['Nombre'];
                      $frasepw=$fila3['Frase'];
                      $valorpw=$fila3['Valor'];
                      if ($fila3['Imagen']) {
                        $imagenpw='img/'.$fila3['Imagen'];
                      }

                    
                  ?>

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 texto2caja3">
                    <div class="card " style="width: 18rem;">
                      <p class="titulo_nombre_producto"><?php echo $nombrepw; ?></p>
                      <img class="card-img-top" style="width: 255px; height: 245px;" src="<?php echo $imagenpw; ?>" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title text-center"><b>$ <?php echo number_format($valorpw); ?></b></h5>
                        <p class="texto_frase"><?php echo $frasepw; ?></p>

                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="mover d-flex justify-content-center">
                              <form class="" name="" method="post" action="productos.php">
                                <input class="agregar_producto" type="submit" name="Agregar al carrito" value="AGREGAR AL CARRITO">
                              </form>
                                <button class="ver_mas" type="submit" name="MAS" value="MAS" data-toggle="modal" data-target="">VER MAS <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>

                                </button>
                              </form>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>


                  <?php
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
          ?>



        <?php
          $consulta="SELECT * FROM tipoweb ORDER BY IdTipoWeb ASC";
          $ejecutar=mysqli_query($con,$consulta);
          $i=0;
          while ($fila=mysqli_fetch_array($ejecutar)) {

            $nombre=$fila['NombreT'];
            $tipoweb=$fila['IdTipoWeb'];
            $descripcion=$fila['Descripcion'];
            $i++;
            if ($i == 1) {
              $collapsed='';
              $boolean='true';
              $show='show';
            } else if($i>1) {
              $collapsed='collapsed';
              $boolean='false';
              $show='';
            }
            
          
        ?>

        <div class="card1">
          <div class="card-header" id="heading<?php echo $i;?>">
            <h5 class="mb-0">
              <button class="btn btn-link <?php echo $collapsed;?>" data-toggle="collapse" data-target="#collapse<?php echo $i;?>" aria-expanded="<?php echo $boolean;?>" aria-controls="collapse<?php echo $i;?>">
                <p class="titulo_productos"><?php echo $nombre; ?></p>
              </button>
            </h5>
          </div>

          <div id="collapse<?php echo $i;?>" class="collapse <?php echo $show;?>" aria-labelledby="heading<?php echo $i;?>" data-parent="#accordion">
            <div class="card-body">
              <div class="row py-2">
                <?php
                  $consulta1="SELECT * FROM productoweb WHERE IdTipoWeb='$tipoweb' AND Estado='Activo'";
                  $ejecutar1=mysqli_query($con,$consulta1);
                  $in=0;

                  while ($fila1=mysqli_fetch_array($ejecutar1)) {
                    $idproducto=$fila1['IdProductoWeb'];
                    $nombre=$fila1['Nombre'];
                    $caracteristica=$fila1['Caracteristicas'];
                    $frase=$fila1['Frase'];
                    $medida=$fila1['Medida'];
                    $altura=$fila1['Altura'];
                    $garantia=$fila1['Garantia'];
                    $existencias=$fila1['Existencias'];
                    $valorunitario=$fila1['ValorUnitario'];
                    if ($fila1['Ruta_Imagen']) {
                      $imagen='img/'.$fila1['Ruta_Imagen'];
                    }
                    

                  
                ?>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 texto2caja3">
                  <div class="card " style="width: 18rem;">
                    <p class="titulo_nombre_producto"><?php echo $nombre; ?></p>
                    <img class="card-img-top" style="width: 255px; height: 245px;" src="<?php echo $imagen; ?>" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title text-center"><b>$ <?php echo number_format($valorunitario); ?></b></h5>
                      <p class="texto_frase"><?php echo $frase; ?></p>

                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="mover d-flex justify-content-center">
                            <form class="" name="" method="post" action="productos.php">
                              <input class="agregar_producto" type="submit" name="Agregar al carrito" value="AGREGAR AL CARRITO">
                            </form>
                              <button class="ver_mas" type="submit" name="MAS" value="MAS" data-toggle="modal" data-target="#actualizar<?php echo $idproducto; ?>">VER MAS <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>

                              </button>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>



        <!-- Modal actualizar -->
          <div id="actualizar<?php echo $idproducto; ?>"class="modal fade" data-target="#actualizar<?php echo $idproducto; ?>" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center">Ficha tecnica</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos">Nombre: </p>
                        </div>

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos_descripcion"><?php echo $nombre; ?> </p>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos">Caracteristicas: </p>
                        </div>

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos_descripcion"><?php echo $caracteristica; ?> </p>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos">Medida: </p>
                        </div>

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos_descripcion"><?php echo $medida; ?> </p>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos">Altura: </p>
                        </div>

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos_descripcion"><?php echo $altura; ?> </p>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos">Garantia: </p>
                        </div>

                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                          <p class="modal_productos_descripcion"><?php echo $garantia; ?> </p>
                        </div>

                      </div>
                      

                      <div class="modal-footer">
                      
                        <div class="row">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="button" class="boton-insertar2" data-dismiss="modal">Cerrar</button>
                          </div>

                        </div>

                      </div>
                
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        <!-- END Modal actualizar -->



                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </div>


      <!--------------------------->


      

    </section>
    <!--FIN DEL TEXTO 1-->



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
</html> 