<?php
  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
  }
  include("../../conexiones/conexion.php");

  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
  ?>

  <?php

  if (!empty($_POST)) {
    if (empty($_POST['selectBodega']) || empty($_POST['txtNombre']) || empty($_POST['txtFecha']) || empty($_POST['txtValor']) || empty($_POST['txtDescripcion'])) {
      //$alert='<p class="msg_error">Algunos campos son abligatorios</p>';
    } else {

      include("../../conexiones/conexion.php");

      $bodega=$_POST['selectBodega'];
      $nombre=$_POST['txtNombre'];
      $fecha=$_POST['txtFecha'];
      $valor=$_POST['txtValor'];
      $descripcion=$_POST['txtDescripcion'];
      

      $sql=mysqli_query($con,"INSERT INTO egresos(IdBodega,NombreE,Fecha,ValorTotal,Descripcion) VALUES($bodega,'$nombre','$fecha','$valor','$descripcion')");
        if ($sql) {
          echo "<script>alert('Registro Insertado')</script>";
          echo "<script>window.open('select_adm_egr.php','_self')</script>";
        }else{
          echo "<script>alert('Error')</script>";
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
                <a class="nav-link" href="../proveedores/select_adm_pro.php">
                  <span data-feather="phone-incoming"></span>
                  PROVEEDORES
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../egresos/select_adm_egr.php">
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
            <h1 class="h2">GASTOS FIJOS</h1>
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

          <div class="row">
            <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
              LISTADO DE GASTOS FIJOS
            </div>
            <div class="listado1 col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <!--LISTADO DE GASTOS FIJOS-->
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="mover d-flex justify-content-center">
                <?php if($_SESSION['rol']==1){ ?>
                <form class="mover d-flex justify-content-end" name="insert" method="post" action="bodega/select_adm_bod.php">
                  <button class="boton-insertar2-tipo-egreso" type="submit" name="BODEGA" >
                    BODEGA <i class="fas fa-key" ></i>
                  </button>
                </form>
                <?php } ?>
                <button class="boton3-ini-nuevo" data-toggle="modal" data-target="#new_egreso"> NUEVO <i class="fas fa-plus"></i> </button>

              </div>
            </div>
          </div>


          <div>
            <form method="post" action="">
              <div class="table-responsive">
                <table>
                  <tr>
                    <td class="th1"><b>N°</b></td>
                    <td class="th1"><b>BODEGA</b></td>
                    <td class="th1"><b>EGRESO</b></td>
                    <td class="th1"><b>FECHA</b></td>
                    <td class="th1"><b>VALOR TOTAL</b></td>
                    <td class="th1"><b>DESCRIPCION</b></td>
                    <td class="th1"><b>ACTUALIZAR</b></td>
                    <?php if($_SESSION['rol']==1){ ?>
                    <td class="th1"><b></b></td>
                    <?php } ?>
                  </tr>

                  <?php
                  $sql_registe=mysqli_query($con,"SELECT COUNT(*) AS cantidad FROM egresos");
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

                    $consulta="SELECT (SELECT NombreB FROM bodega WHERE IdBodega = e.IdBodega)as NombreBodega, (SELECT Direccion FROM bodega WHERE IdBodega = e.IdBodega)as Direccion, e.NombreE, e.Fecha, e.ValorTotal, e.Descripcion, e.IdEgresos, e.IdBodega FROM  egresos e ORDER BY e.IdEgresos DESC LIMIT $desde,$por_pagina";
                    $ejecutar=mysqli_query($con,$consulta);
                    $i=0;
                    while ($fila=mysqli_fetch_array($ejecutar)) {
                      $idegresos=$fila['IdEgresos'];
                      $idbodegaid=$fila['IdBodega'];
                      $idbodega=$fila['NombreBodega'];
                      $idbodega2=$fila['Direccion'];
                      $nombre=$fila['NombreE'];
                      $fecha=$fila['Fecha'];
                      $valortotal=$fila['ValorTotal'];
                      $descripcion=$fila['Descripcion'];
                      $i++;
                      $in=$i+$desde;
                  ?>

                  <tr>
                    <td><?php echo $in; ?></td>
                    <td><?php echo $idbodega; ?> <?php echo "<b>$idbodega2</b>"; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $fecha; ?></td>
                    <td>$ <?php echo number_format($valortotal); ?></td>
                    <td><?php echo $descripcion; ?></td>

                    <td><a class="btn-actualizar" href="#actualizar<?php echo $idegresos; ?>" data-toggle="modal">ACTUALIZAR</a></td>
                    <?php if($_SESSION['rol']==1){ ?>
                    <td><a href="select_adm_egr.php?eliminar=<?php echo $idegresos; ?>"><i class='far fa-trash-alt' style='font-size:24px;color:black;' onclick="return ComfirmDelete()" ></i></a></td>
                    <?php } ?>
                  </tr>

          <!-- Modal actualizar -->
          <div id="actualizar<?php echo $idegresos; ?>"class="modal fade" data-target="#actualizar<?php echo $idegresos; ?>" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center">Actualizar Egreso</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input type="hidden" name="txtid" value="<?php echo $idegresos; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Bodega: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <select name="selectBodega" class="form-control">
                            <option value="NULL">Seleccione una Bodega</option>

                            <?php

                              $sql=mysqli_query($con,"select * from bodega ");
                              while ($res=mysqli_fetch_array($sql)) {
                                $nombreB = $res['NombreB'];
                                $idbodega = $res['IdBodega'];
                                echo "<option value='$idbodega'>$nombreB</option>";
                              }
                            ?>

                          </select>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombre del Egreso: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombre del Egreso:</label>
                          <input type="text" id="inputName" class="form-control" name="txtEgresoNombre" value="<?php echo $nombre; ?>" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Fecha: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputFecha" class="sr-only">Fecha</label>
                          <input type="date" id="inputFecha" class="form-control" name="txtFechaE" value="<?php echo $fecha; ?>" required>
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Valor Total: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputValor" class="sr-only">Valor Total</label>
                          <input type="number" id="inputValor" class="form-control" name="txtValorE" value="<?php echo $valortotal; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Descripcion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <textarea name="txtDescripcionE" cols="25" rows="8" class="form-control" value="<?php echo $descripcion; ?>" required><?php echo $descripcion; ?></textarea>
                          <form action="cgi-bin/control.exe" method="post" enctype="text/plain" name="miform">
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

                <div class="paginador">
                  <ul>
                    <?php 
                      if ($pagina!=1) {
                      
                    ?>
                    <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
                    <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
                    <?php 
                      }
                      for ($i=1; $i <= $total_pagina; $i++) {
                        if ($i==$pagina) {
                           echo '<li class="pageSelected">'.$i.'</li>';
                         } else {
                           echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                         }
                      }
                      if ($pagina!=$total_pagina) {
                    ?>

                    <li><a href="?pagina=<?php echo $pagina+1; ?>">>></a></li>
                    <li><a href="?pagina=<?php echo $total_pagina; ?>">>|</a></li>
                    <?php 
                      }
                    ?>
                  </ul>
                </div>

                <!--FIN PAGINADOR-->
              </div>

              <?php
                if (isset($_POST['actualizar'])) {
                  if (empty($_POST['selectBodega']) || empty($_POST['txtEgresoNombre']) || empty($_POST['txtFechaE']) || empty($_POST['txtValorE']) || empty($_POST['txtDescripcionE'])) {
                    echo "<script>alert('Error')</script>";
                  } else {

                    $idegreso_actualizar=$_POST['txtid'];
                    $idbodega_actualizar=$_POST['selectBodega'];
                    $nombre_actualizar=$_POST['txtEgresoNombre'];
                    $fecha_actualizar=$_POST['txtFechaE'];
                    $valortotal_actualizar=$_POST['txtValorE'];
                    $descripcion_actualizar=$_POST['txtDescripcionE'];

                    $actualizar="UPDATE egresos SET IdBodega=$idbodega_actualizar, NombreE='$nombre_actualizar', Fecha='$fecha_actualizar', ValorTotal='$valortotal_actualizar', Descripcion='$descripcion_actualizar' WHERE IdEgresos=$idegreso_actualizar ";
                    $ejecutar=mysqli_query($con,$actualizar);

                    if ($ejecutar) {
                      echo "<script>alert('Registro Actualizado')</script>";
                      echo "<script>window.open('select_adm_egr.php','_self')</script>";
                    }else{
                      echo "<script>alert('Error en la Actualizacion')</script>";
                    }
                  }
                }
              ?>

              <?php
                if (isset($_GET['eliminar'])) {
                  $borrar_id=$_GET['eliminar'];
                  $eliminar="DELETE FROM egresos WHERE IdEgresos='$borrar_id'";
                  $ejecutar=mysqli_query($con,$eliminar);
                  if ($ejecutar) {
                    echo "<script>alert('el egreso ha sido eliminado')</script>";
                    echo "<script>window.open('select_adm_egr.php','_self')</script>";
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

        <div id="new_egreso" class="modal fade" role="dialog">

          <div class="modal-dialog modal-md">

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center titulo_modal">INSERTAR EGRESO</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                  <form name="form" method="post" action="">
                    <div class="caja-actualizar">
                      
                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Bodega: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <select name="selectBodega" class="form-control">
                            <option value="NULL">Seleccione una Bodega</option>

                            <?php
                              $sql=mysqli_query($con,"select * from bodega ");
                              while ($res=mysqli_fetch_array($sql)) {
                                echo "<option value=".$res['IdBodega'].">".$res['NombreB']."  ".$res['Direccion']."</option>";
                              }
                            ?>

                          </select>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombre del Egreso: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombre del Egreso</label>
                          <input type="text" id="inputName" class="form-control" placeholder="Nombre del Egreso" name="txtNombre" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Fecha: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputFecha" class="sr-only">Fecha</label>
                          <input type="date" id="inputFecha" class="form-control" name="txtFecha" required>
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Valor Total: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputValor" class="sr-only">Valor Total</label>
                          <input type="number" id="inputValor" class="form-control" placeholder="Valor Total" name="txtValor" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Descripcion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDescripcion" class="sr-only">Descripcion</label>
                          <textarea id ="inputDescripcion" name="txtDescripcion" cols="25" rows="8" class="form-control" required></textarea>
                          <form action="cgi-bin/control.exe" method="post" enctype="text/plain" name="miform">
                        </div>

                      </div>

                      <div class="modal-footer">
                      
                        <div class="row">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input class="boton-insertar" type="submit" name="Enviar" value="Insertar">
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