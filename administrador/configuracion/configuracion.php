<?php
  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
  }
  if($_SESSION['rol']==1 || $_SESSION['rol']==2 || $_SESSION['rol']==4){
    ?>
    <?php

  include"../../conexiones/conexion.php";

  if (!empty($_SESSION['idUser'])) {
    $idPersona=$_SESSION['idUser'];
  

  $ejecutar=mysqli_query($con,"SELECT * FROM persona WHERE IdPersona=$idPersona");
  $fila=mysqli_fetch_array($ejecutar);
  $nombre=$fila['NombreP'];
  $apellido=$fila['Apellido'];
  $documento=$fila['Documento'];
  $telefono=$fila['Telefono'];
  $direccion=$fila['Direccion'];
  $contrasena=$fila['Contrasena'];

  }
  $ejecutar_empresa=mysqli_query($con,"SELECT * FROM empresa WHERE IdEmpresa=1");
  $fila2=mysqli_fetch_array($ejecutar_empresa);
  $idempresa=$fila2['IdEmpresa'];
  $nit=$fila2['Nit'];
  $nombreempresa=$fila2['NombreE'];
  $regimen=$fila2['Regimen'];
  $telefonoempresa=$fila2['Telefono'];
  $emailempresa=$fila2['Email'];
  $direccionempresa=$fila2['Direccion'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/m.css"> 
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../dashboard.css">
    <link rel="stylesheet" href="../../product.css">

    <title>COLCHONES LEON</title>
</head>

  <script type="text/javascript">
    function ComfirmDelete()
    {
      var respuesta=confirm("¿Estas seguro de eliminar este registro ?")
      if (respuesta==true) {
        return true;
      }else{
        return false;
      }
    }
  </script>

<body class="foto-ini-rol">
  
	<!--TITULO Y LOGO INICIO-->
    <header id="caja1-rol-titulo">
      <div class="container">
        <div class="row py-2">

          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4  text-center">
            <a href=""><img src="../../img/LOGO.jpg" alt="" height="180" width="180" class="img-fluid my-auto"></a>
            
          </div>

          <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 text-center">
            <h1 id="tit1-rol">COLCHONES LEON</h1>
            <h6 id="tit2-rol">"LO SALVAJE Y LA COMODIDAD SE SIENTE"</h6>
            
          </div>
        </div>
        
      </div>
    </header>
      <!--TITULO Y LOGO INICIO-->


      <!--INICIO DEL NAV-->

      <nav class="site-header sticky-top py-1">
      <div class="d-flex flex-column flex-md-row justify-content-between">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Colchones Leon</a>
        <div class="container d-flex flex-column flex-md-row d-flex justify-content-between">
        <a class="py-2" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </a>
        <?php if($_SESSION['rol']==1 || $_SESSION['rol']==2){ ?>
        <a class="py-2 d-none d-md-inline-block" href="#">REPORTES</a>
        <a class="py-2 d-none d-md-inline-block" href="../reportes/ingresos_egresos.php">
          <span data-feather="bar-chart-2"></span>   INGRESOS Y EGRESOS MENSUALES</a>
        <a class="py-2 d-none d-md-inline-block" href="../reportes/inventario.php">
          <span data-feather="clipboard"></span>   INVENTARIO</a>
        <a class="py-2 d-none d-md-inline-block" href="../reportes/deudores.php">
          <span data-feather="list"></span>   DEUDORES</a>
        <a class="py-2 d-none d-md-inline-block" href="../reportes/ventas.php">
          <span data-feather="trending-up"></span>   VENTAS</a>
          <?php } ?>

        <a class="py-2 d-none d-md-inline-block borde_boton_salir" href="#" style="font-size: 16px;" id="dropdown01" data-toggle="dropdown">SALIR<i class="fa fa-power-off" aria-hidden="true" style="font-size: 23px; padding-top: 3px;"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="../configuracion/configuracion.php">Configuracion</a>
          <a class="dropdown-item" href="../../salir.php">Cerrar Sesion</a>
        </div>

        </div>
      </div>
    </nav>
<!--fa-2x-->
      <!--FIN DEL NAV-->

      <!--INICIO DE LA VISTA-->

      <div class="caja1-rol container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <?php if($_SESSION['rol']==1 || $_SESSION['rol']==2){ ?>
              <li class="nav-item">
                <a class="nav-link" href="../index.php">
                  <span data-feather="home"></span>
                  INICIO <span class="sr-only">(current)</span>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link" href="../ventas/select_adm_ven.php">
                  <span data-feather="shopping-cart"></span>
                  VENTAS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../clientes/select_adm_cli.php">
                  <span data-feather="users"></span>
                  CLIENTES
                </a>
              </li>
              <?php if($_SESSION['rol']==1 || $_SESSION['rol']==2){ ?>
              <li class="nav-item">
                <a class="nav-link" href="../pedidos/select_adm_ped.php">
                  <span data-feather="truck"></span>
                  COMPRAS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../proveedores/select_adm_pro.php">
                  <span data-feather="phone-incoming"></span>
                  PROVEEDORES
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../egresos/select_adm_egr.php">
                  <span data-feather="trending-down"></span>
                  GASTOS FIJOS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../productos/select_adm_pro.php">
                  <span data-feather="shopping-bag"></span>
                  PRODUCTO<!--bar-chart-2-->
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../fabricacion/select_adm_fab.php">
                  <span data-feather="layers"></span>
                  FABRICACION
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="../contratacion/select_adm_con.php">
                  <span data-feather="file-text"></span>
                  NOMINA
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../trabajador/select_adm_tra.php">
                  <span data-feather="user-check"></span>
                  TRABAJADOR
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../mantenimiento/select_adm_man.php">
                  <span data-feather="dollar-sign"></span>
                  MANTENIMIENTO
                </a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

          

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">CONFIGURACION PERSONAL</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              
              <div class="btn-group mr-2">
                <?php if($_SESSION['rol']==1){ ?>
                <div class="caja2-tra">ADMINISTRADOR</div>
                <?php }else if($_SESSION['rol']==2){ ?>
                  <div class="caja2-tra">SECRETARIA</div>
                <?php }else if($_SESSION['rol']==4){ ?>
                  <div class="caja2-tra">VENDEDOR</div>
                <?php }?>
                <!--CERRAR BOTON
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
                CERRAR BOTON-->
              </div>
              <!--CERRAR BOTON
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
              CERRAR BOTON-->
            </div>
          </div>


          <div class="row ">
            <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
              ¡BIENVENID@! <b><?php echo $_SESSION['nombre']; ?></b>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

            </div>
            
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="mover d-flex justify-content-center">
                <?php if($_SESSION['rol']==1){ ?>
                <button class="boton-insertar2-tipo-egreso" data-toggle="modal" data-target="#empresa"> EMPRESA <i class="fa fa-building" aria-hidden="true"></i>
                </button>
                <?php } ?>
                <?php if($_SESSION['rol']==1 || $_SESSION['rol']==2){ ?>

                <form name="insert" method="post" action="../index.php">
                  <input class="boton-insertar2" type="submit" name="Cancelar" value="Cancelar">
                </form>

                <?php }else if($_SESSION['rol']==4){ ?>
                  <form name="insert" method="post" action="../ventas/select_adm_ven.php">
                  <input class="boton-insertar2" type="submit" name="Cancelar" value="Cancelar">
                </form>
                <?php } ?>

              </div>
            </div>
          </div>


          <?php if($_SESSION['rol']==1){ ?>
        <!-- Modal actualizar empresa-->
          <div id="empresa"class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center">Actualizar empresa</b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input type="hidden" name="txtidempresa" value="<?php echo $idempresa; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombre: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombre</label>
                          <input type="text" id="inputName" class="form-control" name="txtNombreEmpresa" value="<?php echo $nombreempresa; ?>" required autofocus>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nit: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputNit" class="sr-only">Nit</label>
                          <input type="text" id="inputNit" class="form-control" name="txtNit" value="<?php echo $nit; ?>" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Regimen: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputRegimen" class="sr-only">Regimen</label>
                          <input type="text" id="inputRegimen" class="form-control" name="txtRegimen" value="<?php echo $regimen; ?>" required>
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Telefono: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputTelefono" class="sr-only">Telefono</label>
                          <input type="number" id="inputTelefono" class="form-control" name="txtTelefonoEmpresa" value="<?php echo $telefono; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Email: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDireccion" class="sr-only">Email</label>
                          <input type="email" id="inputDireccion" class="form-control" name="txtEmailEmpresa" value="<?php echo $emailempresa; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Direccion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDireccion" class="sr-only">Direccion</label>
                          <input type="text" id="inputDireccion" class="form-control" name="txtDireccionEmpresa" value="<?php echo $direccionempresa; ?>">
                        </div>

                      </div>

                      <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input class="boton-insertar" type="submit" name="actualizarEmpresa" value="Actualizar">
                          <button type="button" class="boton-insertar2" data-dismiss="modal">Cancelar</button>
                        </div>

                      </div>

                  </div>
                </form>

                <div class="modal-footer">
                </div>
                
                </div>
              </div>
            </div>
          </div>
        <!-- END Modal actualizar empresa-->
        <?php } ?>

        <?php
          if (isset($_POST['actualizarEmpresa'])) {
            
            if (empty($_POST['txtNombreEmpresa']) || empty($_POST['txtNit']) || empty($_POST['txtRegimen']) || empty($_POST['txtTelefonoEmpresa']) || empty($_POST['txtEmailEmpresa']) || empty($_POST['txtDireccionEmpresa'])) {
              echo "<script>alert('Error')</script>";
            } else {
              $idempresa1=$_POST['txtidempresa'];
              $nombreempresa1=$_POST['txtNombreEmpresa'];
              $nit1=$_POST['txtNit'];
              $regimen1=$_POST['txtRegimen'];
              $telefono1=$_POST['txtTelefonoEmpresa'];
              $email1=$_POST['txtEmailEmpresa'];
              $direccion1=$_POST['txtDireccionEmpresa'];

              $actualizar_empresa="UPDATE empresa SET Nit='$nit1', NombreE='$nombreempresa1', Regimen='$regimen1', Telefono='$telefono1', Email='$email1', Direccion='$direccion1' WHERE IdEmpresa='$idempresa1' ";
              $ejecutar_em=mysqli_query($con,$actualizar_empresa);

              if ($ejecutar_em) {
                echo "<script>alert('Registro Actualizado')</script>";
                echo "<script>window.open('configuracion.php','_self')</script>";
              }else{
                echo "<script>alert('Error')</script>";
              }

            }
            
          }
        ?>
          

          <p class="cambiardatos">Aqui podras cambiar tus datos personales:</p>

          

          <hr>

          <!--DATOS PERSONALES-->

              <div class="container datos_personales">

                <div class="row ">
                  <div class="datospersonales col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <b>DATOS PERSONALES</b>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  tabla_datos">
                    <b>NOMBRES</b>
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  </div>
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 tabla_datos">
                    <p><?php echo $nombre; ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 tabla_datos">
                    <b>APELLIDOS</b>
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  </div>
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 tabla_datos">
                    <p><?php echo $apellido; ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 tabla_datos">
                    <b>DOCUMENTO</b>
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  </div>
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 tabla_datos">
                    <p><?php echo $documento; ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 tabla_datos">
                    <b>TELEFONO</b>
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  </div>
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 tabla_datos">
                    <p><?php echo $telefono; ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 tabla_datos">
                    <b>DIRECCION</b>
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  </div>
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 tabla_datos">
                    <p><?php echo $direccion; ?></p>
                  </div>
                </div>


                <div class="row py-2">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="d-flex justify-content-center">
                      <button class="boton_actualizar_datos" data-toggle="modal" data-target="#actualizar_contrasena"> Actualizar <i class="fa fa-cog"></i> 
                      </button>
                    </div> 
                  </div>
                </div>

                <div class="row py-2">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="d-flex justify-content-center">
                      <button class="boton_actualizar_contrasena" data-toggle="modal" data-target="#new_contrasena">Contraseña <i class="fas fa-unlock-alt"></i> 
                      </button>
                    </div> 
                  </div>
                </div>

              </div>



        <!-- Modal actualizar -->
          <div id="actualizar_contrasena"class="modal fade"  role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center">Actualizar datos personales</b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input type="hidden" name="txtid" value="<?php echo $idPersona; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombres: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombre del Cliente</label>
                          <input type="text" id="inputName" class="form-control" placeholder="Nombre del Cliente" name="txtNombreC" value="<?php echo $nombre; ?>" required autofocus>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Apellidos: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputLastName" class="sr-only">Apellido del Cliente</label>
                          <input type="text" id="inputLastName" class="form-control" placeholder="Apellido del Cliente" name="txtApellidoC" value="<?php echo $apellido; ?>" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Documento: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDocumento" class="sr-only">Documento</label>
                          <input type="number" id="inputDocumento" class="form-control" placeholder="Documento" name="txtDocumentoC" value="<?php echo $documento; ?>" required>
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Telefono: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputTelefono" class="sr-only">Telefono</label>
                          <input type="number" id="inputTelefono" class="form-control" placeholder="Telefono" name="txtTelefonoC" value="<?php echo $telefono; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Direccion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDireccion" class="sr-only">Direccion</label>
                          <input type="text" id="inputDireccion" class="form-control" placeholder="Direccion" name="txtDireccionC" value="<?php echo $direccion; ?>">
                        </div>

                      </div>


                      <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input class="boton-insertar" type="submit" name="actualizardatos" value="Actualizar">
                          <button type="button" class="boton-insertar2" data-dismiss="modal">Cancelar</button>
                        </div>

                      </div>

                  </div>
                </form>

                <div class="modal-footer">
                </div>
                
                </div>
              </div>
            </div>
          </div>
        <!-- END Modal actualizar -->

        <?php 
          if (isset($_POST['actualizardatos'])) {
            
            if (empty($_POST['txtNombreC']) || empty($_POST['txtApellidoC']) || empty($_POST['txtDocumentoC']) || empty($_POST['txtTelefonoC']) || empty($_POST['txtDireccionC'])) {
              echo "<script>alert('Error')</script>";
            } else {
              $idp=$_POST['txtid'];
              $nombre=$_POST['txtNombreC'];
              $apellido=$_POST['txtApellidoC'];
              $documento=$_POST['txtDocumentoC'];
              $telefono=$_POST['txtTelefonoC'];
              $direccion=$_POST['txtDireccionC'];

              $actualizar="UPDATE persona SET NombreP='$nombre', Apellido='$apellido', Documento='$documento', Telefono='$telefono', Direccion='$direccion' WHERE IdPersona='$idp' ";
              $ejecutar=mysqli_query($con,$actualizar);

              if ($ejecutar) {
                echo "<script>alert('Registro Actualizado')</script>";
                echo "<script>window.open('configuracion.php','_self')</script>";
              }else{
                echo "<script>alert('Error')</script>";
              }

            }
            
          }
        ?>

        <!--INICIO MODAL CAMBIO DE CONTRASEÑA-->

        <div id="new_contrasena" class="modal fade" role="dialog">

          <div class="modal-dialog modal-md">

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center titulo_modal">CAMBIAR CONTRASEÑA</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                  <form name="form" method="post" action="">
                    <div class="caja-actualizar">
                      
                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Contraseña actual: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputContrasena1" class="sr-only">Contraseña actual</label>
                          <input type="password" id="inputContrasena1" class="form-control"  name="txtContrasena1" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nueva Contraseña: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputContrasena2" class="sr-only">Nueva Contraseña</label>
                          <input type="password" id="inputContrasena2" class="form-control" name="txtContrasena2" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Repetir Contraseña: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputContrasena3" class="sr-only">Repetir Contraseña</label>
                          <input type="password" id="inputContrasena3" class="form-control" name="txtContrasena3" required>
                        </div>

                      </div>

                      <div class="modal-footer">
                      
                        <div class="row">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input class="boton-insertar" type="submit" name="contrasena" value="Actualizar">
                            <button type="button" class="boton-insertar2" data-dismiss="modal">Cancelar</button>
                          </div>

                        </div>

                      </div>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>  

          <!--FIN MODAL CAMBIO DE CONTRASEÑA-->


          <!--INICIO MODAL CAMBIO DE CONTRASEÑA-->

        <div id="new_contrasena" class="modal fade" role="dialog">

          <div class="modal-dialog modal-md">

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center titulo_modal">CAMBIAR CONTRASEÑA</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                  <form name="form" method="post" action="">
                    <div class="caja-actualizar">
                      
                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Contraseña actual: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputContrasena1" class="sr-only">Contraseña actual</label>
                          <input type="password" id="inputContrasena1" class="form-control"  name="txtContrasena1" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nueva Contraseña: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputContrasena2" class="sr-only">Nueva Contraseña</label>
                          <input type="password" id="inputContrasena2" class="form-control" name="txtContrasena2" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Repetir Contraseña: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputContrasena3" class="sr-only">Repetir Contraseña</label>
                          <input type="password" id="inputContrasena3" class="form-control" name="txtContrasena3" required>
                        </div>

                      </div>

                      <div class="modal-footer">
                      
                        <div class="row">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input class="boton-insertar" type="submit" name="contrasena" value="Insertar">
                            <button type="button" class="boton-insertar2" data-dismiss="modal">Cancelar</button>
                          </div>

                        </div>

                      </div>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>  

          <!--FIN MODAL CAMBIO DE CONTRASEÑA-->


            <!--FIN DATOS PERSONALES-->

            <?php
              if (isset($_POST['contrasena'])) {
                if (empty($_POST['txtContrasena1']) || empty($_POST['txtContrasena2']) || empty($_POST['txtContrasena3'])) {
                  echo "<script>alert('Error')</script>";
                }else{
                  $contrasena2=md5($_POST['txtContrasena2']);
                  $contrasena3=md5($_POST['txtContrasena3']);
                  $pass=md5(mysqli_real_escape_string($con,$_POST['txtContrasena1']));

                  $query= mysqli_query($con,"SELECT * FROM persona WHERE IdPersona='$idPersona' AND Contrasena='$pass'");
                  $result= mysqli_num_rows($query);

                  if ($result>0) {
                    
                    if ($contrasena2==$contrasena3) {
                      $correct=$contrasena2;
                      $actualizar_con="UPDATE persona SET Contrasena='$correct' WHERE IdPersona='$idPersona' ";
                      $ejecutar_act=mysqli_query($con,$actualizar_con);

                        if ($ejecutar_act) {
                          echo "<script>alert('Registro Actualizado')</script>";
                          echo "<script>window.open('configuracion.php','_self')</script>";
                        }else{
                          echo "<script>alert('Error')</script>";
                        }

                    }else{
                      echo "<script>alert('Las Contraseñas no coinciden')</script>";
                    }
                  } else {
                    echo "<script>alert('Contraseña incorrecta')</script>";
                  }
                  
                }
              }
            ?>


            <!--<h4 class="fromCenter">Expand from center</h1><br/>
            <h4 class="fromRight">Expand from right</h1><br/>
            <h4 class="fromLeft">Expand from left</h1>-->



        </main>
      </div>
    </div>

      <!--FIN DE LA VISTA-->


      <!--INICIO PIE DE PAGINA-->

      <footer class="cajapie-rol text-center">
        <div class="container">
          <div class="row py-2">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <p><div class="tit1pie-rol"><h6>Copyright 2018 © Todos los derechos reservados - COLCHONES LEON -</h6></div></p>
            </div>
          </div>
        </div>
      </footer>

      <!--FIN PIE DE PAGINA-->




      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Icons -->
    <script src="../../feather.min.js"></script>
    <script>
      feather.replace()
    </script>




	  <script src="../../js/fontawesome-all.js"></script>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
</body>
</html>

<?php }else{
  header('location: ../../salir.php');
} ?>