<?php
  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
  }
  include("../../conexiones/conexion.php");
  if($_SESSION['rol']==1 || $_SESSION['rol']==2 || $_SESSION['rol']==4){
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
                <a class="nav-link active" href="../ventas/select_adm_ven.php">
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
            <h1 class="h2">VENTAS</h1>
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

          <?php
            $busqueda=strtolower($_REQUEST['busqueda']);
            if (empty($busqueda)) {
              header("location: select_adm_ven.php");
            }
          ?>

          <div class="row">
            <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
              LISTADO DE VENTAS
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              
              <!--buscador-->

                  <form action="buscador.php" method="get" class="form_search">
                    <input type="text" name="busqueda" id="busqueda" placeholder=" BUSCAR..." value="<?php echo $busqueda; ?>">
                    <input type="submit" value="BUSCAR" class="btn_search">
                  </form>

                <!--fin buscador-->

            </div>

            <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <div class="mover d-flex justify-content-center">
                <?php if($_SESSION['rol']==1 || $_SESSION['rol']==2){ ?>
                <form class="mover d-flex justify-content-end" name="insert" method="post" action="deudores/select_adm_deu.php">
                  <button class="boton-insertar2-tipo-producto" type="submit" name="DEUDORES" value="DEUDORES">
                    CLIENTES DEUDORES <i class="fa fa-list" aria-hidden="true"></i>




                  </button>
                </form>
                <?php } ?>

                

                <form class="mover d-flex justify-content-end" name="insert" method="post" action="insert_adm_ven.php">
                  <button class="boton3-ini-nuevo"> NUEVO <i class="fas fa-plus"></i> </button>
                </form>

              </div>
            </div>
          </div>


          
      <!--CONSULTA 4-->
              <div class="table-responsive">
                <table>
                  <tr>
                    <td class="th1"><b>FAC_N°</b></td>
                    <td class="th1"><b>FECHA</b></td>
                    <td class="th1"><b>CLIENTE</b></td>
                    <td class="th1"><b>DOCUMENTO</b></td>
                    <td class="th1"><b>TIPO</b></td>
                    <td class="th1"><b>VENDEDOR</b></td>
                    <td class="th1"><b>ESTADO</b></td>
                    <td class="th1"><b>VALOR TOTAL</b></td>
                    <td class="th1"><b>VER</b></td>
                    <td class="th1"><b>ANULAR</b></td>
                  </tr>

                  <?php
                    $sql_registe=mysqli_query($con,"SELECT COUNT(*) AS cantidad FROM venta v, persona perso WHERE perso.IdPersona=v.IdPersona AND (v.IdVenta LIKE '$busqueda' OR perso.NombreP LIKE '%$busqueda%' OR perso.Apellido LIKE '%$busqueda%' OR perso.Documento LIKE '%$busqueda%')");
                    $result_register=mysqli_fetch_array($sql_registe);
                    $numero=$result_register['cantidad'];

                    $por_pagina=25;
                    if (empty($_GET['pagina'])) {
                      $pagina=1;
                    }else{
                      $pagina=$_GET['pagina'];
                    }

                    $desde=($pagina-1)*$por_pagina;
                    $total_pagina=ceil($numero / $por_pagina);


                    $consulta="SELECT v.IdVenta AS cod_venta, (SELECT pr.NombreP FROM persona pr WHERE pr.IdPersona=v.IdPersona) AS cliente, (SELECT pe.Apellido FROM persona pe WHERE pe.IdPersona=v.IdPersona) AS apellido ,(SELECT persona.Documento FROM persona WHERE persona.IdPersona=v.IdPersona) AS documento,(SELECT persona.TipoCliente FROM persona WHERE persona.IdPersona=v.IdPersona) AS tipo_cliente, (SELECT p.NombreP FROM persona p WHERE p.IdPersona=v.IdVendedor) AS vendedor, v.Fecha AS fecha, v.ValorTotal AS valortotal, v.Estado AS estado FROM venta v, persona perso WHERE perso.IdPersona=v.IdPersona AND (v.IdVenta LIKE '$busqueda' OR perso.NombreP LIKE '%$busqueda%' OR perso.Apellido LIKE '%$busqueda%' OR perso.Documento LIKE '%$busqueda%') ORDER BY v.IdVenta DESC LIMIT $desde,$por_pagina";
                    $ejecutar=mysqli_query($con,$consulta);
                    $i=0;
                    while ($fila=mysqli_fetch_array($ejecutar)) {
                      $idventa=$fila['cod_venta'];
                      $apellido=$fila['apellido'];
                      $nombreC=$fila['cliente'];
                      $vendedor=$fila['vendedor'];
                      $fecha=$fila['fecha'];
                      $valor=$fila['valortotal'];
                      $estado=$fila['estado'];
                      $documento=$fila['documento'];
                      $tipo=$fila['tipo_cliente'];
                      $i++;
                  ?>

                  <tr>
                    <td><?php echo $idventa; ?></td>
                    <td><?php echo $fecha; ?></td>
                    <td><?php echo $nombreC; ?> <?php echo $apellido; ?></td>
                    <td><?php echo $documento; ?></td>
                    <td><?php echo $tipo; ?></td>
                    <td><?php echo $vendedor; ?></td>

                    <?php if($estado == 'Pagada'){ ?>
                    <td><p class="estado11"><?php echo $estado; ?></p></td>
                    <?php }else if($estado=='Anulada'){ ?>
                    <td><p class="estado22"><?php echo $estado; ?></p></td>
                    <?php } ?>

                    <td>$ <?php echo number_format($valor); ?></td>

                    
                    <td>

                      <form action="pdf_ventas.php" method="post" target="_blank">
                        <input type="hidden" name="id_venta" value="<?php echo $idventa; ?>">
                        <button class="btn_ver_fac">VER <i class="fa fa-search" aria-hidden="true"></i></button>
                      </form>

                    </td>

                    <?php if($estado=='Anulada'){ ?>
                    

                    <td><button class="btn_anular_fac1">ANULAR<i class='fas fa-ban' style='color:rgb(220,220,220);' onclick="return ComfirmDelete()" ></i></button></td>

                    <?php }else if($estado=='Pagada'){ ?>

                    <td><button class="btn_anular_fac" href="#eliminar<?php echo $idventa; ?>" data-toggle="modal">ANULAR<i class='fas fa-ban' style='color:rgb(240,240,240);'></i></button></td>

                    <?php } ?>

                  </tr>


          <!-- Modal actualizar -->

          <div id="eliminar<?php echo $idventa; ?>"class="modal fade" data-target="#eliminar<?php echo $idventa; ?>" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <p class="modal-title text-center"><h3>ANULAR FACTURA</h3></p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input type="hidden" name="txtid" value="<?php echo $idventa; ?>">
                        </div>

                      </div>

                      <div class="row py-2">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                          <center>
                            <i class="icon-paste fa-5x " style="color: #358361;"></i>
                          </center>
                          <center><h3 class="color_anular_fac">ANULAR FACTURA</h3></center>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 texto_anular">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Realmente desea anular la factura:
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <b>Fac_n°. <?php echo $idventa; ?></b>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <b>Valor Total. $ <?php echo number_format($valor); ?></b>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <b>Fecha. <?php echo $fecha; ?></b>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">

                        <div class="row">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input class="boton-insertar" type="submit" name="eliminar" value="Actualizar">
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

            <!--fin conculta 4-->

            <!--anular factura-->

            <?php 
            if (isset($_POST['eliminar'])) {
              $id_cod_venta=$_POST['txtid'];
              $consulta_productos=mysqli_query($con,"SELECT * FROM detalleventa WHERE IdVenta='$id_cod_venta'");
              while ($fila_act_pro=mysqli_fetch_array($consulta_productos)) {
                $idproducto=$fila_act_pro['IdProducto'];
                $cantidad=$fila_act_pro['Cantidad'];
                $update_productos=mysqli_query($con,"UPDATE producto SET Existencias=Existencias+'$cantidad' WHERE IdProducto='$idproducto'");
              }
              $update_venta=mysqli_query($con,"UPDATE venta SET Estado='Anulada' WHERE IdVenta='$id_cod_venta'");
              if ($ejecutar) {
                echo "<script>alert('Factura anulada')</script>";
                echo "<script>window.open('select_adm_ven.php','_self')</script>";
              }else{
                echo "<script>alert('Error')</script>";
              }
            }
            
            ?>

            <!--fin anular factura-->


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