<?php
  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
  }
  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
  ?>
  <?php
  include("../../conexiones/conexion.php");

  if (isset($_POST['nuevo'])) {
    $alert='';
    if (empty($_POST['txtNombreP']) || empty($_POST['txtNITP']) || empty($_POST['txtDireccionP'])) {
      //$alert='<p class="msg_error">Algunos campos son abligatorios</p>';
    }else{

      include"../../conexiones/conexion.php";

      $nombre=$_POST['txtNombreP'];
      $nit=$_POST['txtNITP'];
      $direccion1=$_POST['txtDireccionP'];
      $telefono1= (empty($_POST['txtTelefono1P']))? '': $_POST['txtTelefono1P'];
      $telefono2=(empty($_POST['txtTelefono2P']))? '': $_POST['txtTelefono2P'];
      $selectRegimen=(empty($_POST['selectRegimen']))? '': $_POST['selectRegimen'];
      
      if(!empty($_POST['txtEmailP'])){
          $usuario1 = $_POST['txtEmailP'];
          $query=mysqli_query($con,"SELECT * FROM proveedor WHERE Email='$usuario1' ");
          $result=mysqli_fetch_array($query);
        }else{
          $result = null;
          $usuario1=null;
        }
        if ($result) {
          echo "<script>alert('El correo ya existe')</script>";
        }else{
          $sql=mysqli_query($con,"INSERT INTO proveedor(Nombre, Nit, Direccion, Email, Telefono1, Telefono2, Regimen) VALUES('$nombre','$nit','$direccion1','$usuario1','$telefono1','$telefono2','$selectRegimen')");

          if ($sql) {
            echo "<script>alert('Registro Insertado')</script>";
            echo "<script>window.open('../proveedores/select_adm_pro.php','_self')</script>";
          }else{
            echo "<script>alert('Error')</script>";
          }
        }
    }

  }
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
        <a class="py-2 d-none d-md-inline-block" href="#">REPORTES</a>
        <a class="py-2 d-none d-md-inline-block" href="../reportes/ingresos_egresos.php">
          <span data-feather="bar-chart-2"></span>   INGRESOS Y EGRESOS MENSUALES</a>
        <a class="py-2 d-none d-md-inline-block" href="../reportes/inventario.php">
          <span data-feather="clipboard"></span>   INVENTARIO</a>
        <a class="py-2 d-none d-md-inline-block" href="../reportes/deudores.php">
          <span data-feather="list"></span>   DEUDORES</a>
        <a class="py-2 d-none d-md-inline-block" href="../reportes/ventas.php">
          <span data-feather="trending-up"></span>   VENTAS</a>

          <a class="py-2 d-none d-md-inline-block borde_boton_salir" href="#" style="font-size: 16px;" id="dropdown01" data-toggle="dropdown">SALIR<i class="fa fa-power-off" aria-hidden="true" style="font-size: 23px; padding-top: 3px;"></i>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="../configuracion/configuracion.php">Configuracion</a>
            <a class="dropdown-item" href="../../salir.php">Cerrar Sesion</a>
          </div>

        </div>
      </div>
    </nav>

      <!--FIN DEL NAV-->

      <!--INICIO DE LA VISTA-->

      <div class="caja1-rol container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="../index.php">
                  <span data-feather="home"></span>
                  INICIO <span class="sr-only">(current)</span>
                </a>
              </li>
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
              <li class="nav-item">
                <a class="nav-link" href="../pedidos/select_adm_ped.php">
                  <span data-feather="truck"></span>
                  COMPRAS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../proveedores/select_adm_pro.php">
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
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">PROVEEDORES</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              
              <div class="btn-group mr-2">
                <?php if($_SESSION['rol']==1){ ?>
                <div class="caja2-tra">ADMINISTRADOR</div>
                <?php }else if($_SESSION['rol']==2){ ?>
                  <div class="caja2-tra">SECRETARIA</div>
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

          <?php
          $busqueda=strtolower($_REQUEST['busqueda']);
          if (empty($busqueda)) {
            header("location: ../proveedores/index.php");
          }
          ?>

          <div class="row">
            <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
              LISTADO DE PROVEEDORES
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <form action="../buscador/buscar_proveedor.php" method="get" class="form_search">
                <input type="text" name="busqueda" id="busqueda" placeholder="buscar..." value="<?php echo $busqueda; ?>">
                <input type="submit" value="BUSCAR" class="btn_search">
              </form>
            </div>
            
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
              <div class="mover d-flex justify-content-center">

                <button class="boton3-ini-nuevo" data-toggle="modal" data-target="#new_proveedores"> NUEVO <i class="fas fa-plus"></i> 
                </button>
                
              </div>
            </div>
          </div>

          <div>
            <form method="post" action="">
              <div class="table-responsive">
                <table>
                  <tr>
                    <td class="th1"><b>N°</b></td>
                    <td class="th1"><b>NOMBRES</b></td>
                    <td class="th1"><b>NIT</b></td>
                    <td class="th1"><b>DIRECCION</b></td>
                    <td class="th1"><b>EMAIL</b></td>
                    <td class="th1"><b>TELEFONO1</b></td>
                    <td class="th1"><b>TELEFONO2</b></td>
                    <td class="th1"><b>REGIMEN</b></td>
                    <?php if($_SESSION['rol']==1){ ?>
                    <td class="th1"><b>ACTUALIZAR</b></td>
                    <td class="th1"><b></b></td>
                    <?php } ?>
                  </tr>

                  <?php
                  $sql_registe=mysqli_query($con,"SELECT COUNT(*) AS cantidad FROM proveedor WHERE (Nombre LIKE '%$busqueda%' OR Nit LIKE '%$busqueda%' ) ");
                    $result_register=mysqli_fetch_array($sql_registe);
                    $numero=$result_register['cantidad'];

                    $por_pagina=10;
                    if (empty($_GET['pagina'])) {
                      $pagina=1;
                    }else{
                      $pagina=$_GET['pagina'];
                    }

                    $desde=($pagina-1)*$por_pagina;
                    $total_pagina=ceil($numero / $por_pagina);

                    $consulta="SELECT * FROM proveedor WHERE (Nombre LIKE '%$busqueda%' OR Nit LIKE '%$busqueda%') LIMIT $desde,$por_pagina";
                    $ejecutar=mysqli_query($con,$consulta);
                    $i=0;
                    while ($fila=mysqli_fetch_array($ejecutar)) {
                      $idproveedor=$fila['IdProveedor'];
                      $nombre=$fila['Nombre'];
                      $nit=$fila['Nit'];
                      $direccion=$fila['Direccion'];
                      $email=$fila['Email'];
                      $telefono1=$fila['Telefono1'];
                      $telefono2=$fila['Telefono2'];
                      $regimen=$fila['Regimen'];
                      $i++;
                      $in=$i+$desde;
                  ?>

                  <tr>
                    <td><?php echo $in; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $nit; ?></td>
                    <td><?php echo $direccion; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $telefono1; ?></td>
                    <td><?php echo $telefono2; ?></td>
                    <td><?php echo $regimen; ?></td>

                    <?php if($_SESSION['rol']==1){ ?>

                    <td><a class="btn-actualizar" href="#actualizar<?php echo $idproveedor; ?>" data-toggle="modal">ACTUALIZAR</a></td>

                    <td><a href="../proveedores/select_adm_pro.php?eliminar=<?php echo $idproveedor; ?>"><i class='far fa-trash-alt' style='font-size:24px;color:black;' onclick="return ComfirmDelete()" ></i></a></td>
                    <?php }?>
                  </tr>



          <!-- Modal actualizar -->
          <div id="actualizar<?php echo $idproveedor; ?>"class="modal fade" data-target="#actualizar<?php echo $idproveedor; ?>" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center">Actualizar al proveedor <b><?php echo $nombre; ?></b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input type="hidden" name="txtid" value="<?php echo $idproveedor; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombre: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombre</label>
                          <input type="text" id="inputName" class="form-control" placeholder="Nombre del Cliente" name="txtNombreP" value="<?php echo $nombre; ?>" required autofocus>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">NIT: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputLastName" class="sr-only">NIT</label>
                          <input type="text" id="inputLastName" class="form-control" name="txtNITP" value="<?php echo $nit; ?>" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Direccion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDocumento" class="sr-only">Direccion</label>
                          <input type="text" id="inputDocumento" class="form-control" placeholder="Documento" name="txtDireccionP" value="<?php echo $direccion; ?>" required>
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Email: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputTelefono" class="sr-only">Email</label>
                          <input type="email" id="inputTelefono" class="form-control" name="txtEmailP" value="<?php echo $email; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Telefono 1: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDireccion" class="sr-only">Telefono1</label>
                          <input type="number" id="inputDireccion" class="form-control" name="txtTelefono1" value="<?php echo $telefono1; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Telefono 2: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputEmail" class="sr-only">Telefono2</label>
                          <input type="number" id="inputEmail" class="form-control" name="txtTelefono2" value="<?php echo $telefono2; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Regimen: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <?php
                            $buscar=mysqli_query($con,"SELECT Regimen FROM proveedor WHERE IdProveedor='$idproveedor' ");
                            $result_sql=mysqli_fetch_array($buscar);
                            $regimen=$result_sql['Regimen'];
                          ?>
                          <select name="txtRegimenP" class="notItemOne form-control">

                            <?php

                            echo "<option value=".$result_sql['Regimen'].">".$result_sql['Regimen']."</option>";

                              $sql=mysqli_query($con,"SELECT Regimen FROM proveedor GROUP BY Regimen");
                              while ($res=mysqli_fetch_array($sql)) {
                                echo "<option value=".$res['Regimen'].">".$res['Regimen']."</option>";
                              }
                            ?>
                          </select>
                        </div>

                      </div>

                      <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input class="boton-insertar" type="submit" name="actualizar" value="Actualizar">
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
                    }
                  ?>

                </table>

                <!--INICIO PAGINADOR-->
                <?php if ($numero !=0) { ?>

                <?php if ($in>=10) { ?>
                <div class="paginador">
                  <ul>
                    <?php 
                      if ($pagina!=1) {
                      
                    ?>
                    <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo$busqueda; ?>">|<</a></li>
                    <li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo$busqueda; ?>"><<</a></li>
                    <?php 
                      }
                      for ($i=1; $i <= $total_pagina; $i++) {
                        if ($i==$pagina) {
                           echo '<li class="pageSelected">'.$i.'</li>';
                         } else {
                           echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
                         }
                      }
                      if ($pagina!=$total_pagina) {
                    ?>

                    <li><a href="?pagina=<?php echo $pagina+1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
                    <li><a href="?pagina=<?php echo $total_pagina; ?>&busqueda=<?php echo $busqueda; ?>">>|</a></li>
                    <?php 
                      }
                    ?>
                  </ul>
                </div>
                <?php } ?>

                <?php } ?>

                <!--FIN PAGINADOR-->

              </div>

              <?php
                if (isset($_POST['actualizar'])) {
                  
                  if (empty($_POST['txtNombreP']) || empty($_POST['txtNITP']) || empty($_POST['txtDireccionP']) || empty($_POST['txtRegimenP'])) {
                    echo "<script>alert('Error')</script>";
                  } else {

                    $idp_a=$_POST['txtid'];
                    $nombre_a=$_POST['txtNombreP'];
                    $nit_a=$_POST['txtNITP'];
                    $direccion_a=$_POST['txtDireccionP'];
                    $telefono1_a= (empty($_POST['txtTelefono1P']))? '': $_POST['txtTelefono1P'];
                    $telefono2_a=(empty($_POST['txtTelefono2P']))? '': $_POST['txtTelefono2P'];
                    $regimen_a=$_POST['txtRegimenP'];

                    if (!empty($_POST['txtEmailP'])) {
                      $usuario_a=$_POST['txtEmailP'];
                      $query=mysqli_query($con,"SELECT * FROM proveedor WHERE Email='$usuario_a' AND IdProveedor !=$idp_a ");
                      $result=mysqli_fetch_array($query);
                    } else {
                      $result = null;
                      $usuario_a=null;
                    } 

                    if ($result>0) {
                      echo "<script>alert('El Correo ya existe')</script>";
                    } else {
                      $actualizar2="UPDATE proveedor SET Nombre='$nombre_a', Nit='$nit_a', Direccion='$direccion_a', Email='$usuario_a', Telefono1='$telefono1_a', Telefono2='$telefono2_a', Regimen='$regimen_a' WHERE IdProveedor=$idp_a ";
                      $ejecutar2=mysqli_query($con,$actualizar2);

                      if ($ejecutar2) {
                        echo "<script>alert('Registro Actualizado')</script>";
                        echo "<script>window.open('../proveedores/select_adm_pro.php','_self')</script>";
                      }else{
                        echo "<script>alert('Error')</script>";
                      }
                    }
                  }
                }
              ?>

              <?php
                if (isset($_GET['eliminar'])) {
                  $borrar_id=$_GET['eliminar'];
                  $eliminar="DELETE FROM proveedor WHERE IdProveedor='$borrar_id'";
                  $ejecutar=mysqli_query($con,$eliminar);
                  if ($ejecutar) {
                    echo "<script>alert('el proveedor ha sido eliminado')</script>";
                    echo "<script>window.open('../proveedores/select_adm_pro.php','_self')</script>";
                  }else{
                    echo "<script>alert('Error')</script>";
                  }
                }
              ?>

            </form>
          </div>

        </main>
      </div>
    </div>

      <!--FIN DE LA VISTA-->


      <!--INICIO MODALES-->

        <!--INICIO MODAL INSERTAR-->

        <div id="new_proveedores" class="modal fade" role="dialog">

          <div class="modal-dialog modal-md">

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center titulo_modal">INSERTAR PROVEEDOR</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                  <form name="form" method="post" action="">
                    <div class="caja-actualizar">
                      
                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombre: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombre del Proveedor</label>
                          <input type="text" id="inputName" class="form-control" placeholder="Nombre del Proveedor" name="txtNombreP" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">NIT: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputNIT" class="sr-only">NIT</label>
                          <input type="text" id="inputNIT" class="form-control" placeholder="NIT" name="txtNITP" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Direccion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDireccion" class="sr-only">Direccion</label>
                          <input type="text" id="inputDireccion" class="form-control" placeholder="Direccion" name="txtDireccionP" required>
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Email: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputEmail" class="sr-only">Correo Electronico</label>
                          <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" name="txtEmailP">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Telefono 1: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputTelefono1" class="sr-only">Telefono1</label>
                          <input type="number" id="inputTelefono1" class="form-control" placeholder="Telefono1" name="txtTelefono1P">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Telefono 2: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputTelefono2" class="sr-only">Telefono2</label>
                          <input type="number" id="inputTelefono2" class="form-control" placeholder="Telefono2" name="txtTelefono2P">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Regimen: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <select name="selectRegimen" class="form-control">
                            <option value="Comun">Comun</option>
                            <option value="Simplificado">Simplificado</option>
                          </select>
                        </div>

                      </div>

                      <div class="modal-footer">
                      
                        <div class="row">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input class="boton-insertar" type="submit" name="nuevo" value="Insertar">
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

          <!--FIN MODAL INSERTAR-->

        <!--FIN MODALES-->


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
    -->

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