<?php
  include"../conexiones/conexion.php";
  $consultae="SELECT * FROM empresa";
  $ejecutare=mysqli_query($con,$consultae);
  $filae=mysqli_fetch_array($ejecutare);
  $direccion=$filae['Direccion'];
  $telefono=$filae['Telefono'];
  $email=$filae['Email'];
?>
<?php 
  if (isset($_POST['guardar'])) {
    $alert='';
    if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['documento']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['correo']) || empty($_POST['correo2']) || empty($_POST['contrasena']) || empty($_POST['contrasenarep'])) {
      echo "<script>alert('Todos los campos son obligatorios')</script>";
    }else{

      include"../conexiones/conexion.php";

      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $documento=$_POST['documento'];
      $telefono=$_POST['telefono'];
      $direccion=$_POST['direccion'];
      $correo2=$_POST['correo2'];
      $clave1=md5($_POST['contrasena']);
      $clave2=md5($_POST['contrasenarep']);
      
      if(!empty($_POST['correo'])){
          $usuario1 = $_POST['correo'];
          $query=mysqli_query($con,"SELECT * FROM usuario WHERE Correo='$usuario1' ");
          $result=mysqli_fetch_array($query);
        }else{
          $result = null;
          $usuario1=null;
        }
        if ($result) {
          $alert='<p class="alert">El correo ya existe</p>';
        }else{

          if ($clave1==$clave2){
            $contrasena=$clave1;
          $query_insert=mysqli_query($con,"INSERT INTO usuario(NombreU,Apellido,Documento,Telefono,Direccion,Correo,CorreoRecuperacion,Contrasena,Rol) VALUES('$nombre','$apellido','$documento','$telefono','$direccion','$usuario1','$correo2','$contrasena','2' )");

            if ($query_insert) {
              echo "<script>alert('Registro Insertado')</script>";
              echo "<script>window.open('Iniciar sesion.php','_self')</script>";
              //$alert='<p class="msg_error">Usuario creado</p>';
            }else{
              echo "<script>alert('Error')</script>";
              //$alert='<p class="msg_error">Error</p>';
            }
          }else if($clave1!=$clave2){
            echo "<script>alert('Las contraseñas no coinciden')</script>";
          }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilosproyecto.css"> 
    <link rel="stylesheet" href="../css/font-awesome.min.css"> 
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/m.css">
    <link rel="stylesheet" href="formulario.css">

    <title>COLCHONES LEON</title>
  </head>
<body>
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


    <!--INICIO DEL TEXTO 1--> <!--FILA-->
    <section class="texto1estilos">

      <div class="container">

      <article>

          <div class="row" style="border-top: 1px solid rgb(200,200,200);">
            <div class="texto1caja1 texto1-1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
              CREAR CUENTA
            </div>
          </div>
          <div class="centrar_todo">

            <div class="centrar_crear_cuenta form-signin" >
              

              <form class="form" method="post" action="">

                <div class="row py-2">

                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="listado1">COMPLETE EL SIGUIENTE FORMULARIO:</p>
                  </div>

                </div>

                <div class="row">

                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p type="Nombres:"><input class="input1" type="text" placeholder="Nombres..." name="nombre"></p>
                  </div>

                </div>

                <div class="row">

                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p type="Apellidos:"><input class="input1" type="text" placeholder="Apellidos..." name="apellido"></p>
                  </div>

                </div>

                <div class="row">

                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p type="Documento:"><input class="input2" type="number" name="documento"></p>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p type="Telefono:"><input class="input2" type="number" name="telefono"></p>
                  </div>

                </div>

                <div class="row">

                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p type="Direccion:"><input type="text" class="input1" placeholder="Direccion actual" name="direccion"></p>
                  </div>

                </div>

                <div class="row">

                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p type="Correo:"><input type="email" class="input1" placeholder="ejemplo@gmail.com" name="correo"></p>
                  </div>

                </div>

                <div class="row">

                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p type="Correo de recuperacion:"><input type="email" class="input1" placeholder="correo actual" name="correo2"></p>
                  </div>

                </div>

                <div class="row">

                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p type="Contraseña:"><input type="password" class="input1" placeholder="**********" name="contrasena"></p>
                  </div>

                </div>
                <div class="row">

                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <p type="Repetir contraseña:"><input type="password" class="input1" placeholder="**********" name="contrasenarep"></p>
                  </div>

                </div>

                <div class="row py-4">
<!--boton-insertar-->
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="d-flex justify-content-center">
                      <input class="boton_guardar_usuario" type="submit" name="guardar" value="Guardar informacion">
                    </div>
                  </div>

                </div>

              </form>

            </div>

          </div>

      </article>
      </div>
    </section>
    <!--FIN DEL TEXTO 1-->


    

<!-- INICIO DEL TEXTO 5-->

  <section class="caja5">
    <article>
      <hr>
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