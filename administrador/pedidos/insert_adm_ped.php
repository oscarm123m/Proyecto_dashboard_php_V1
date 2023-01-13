<?php

  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
  }
  include("../../conexiones/conexion.php");

  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
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
<body class="foto-ini-rol-1">
  
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
                <a class="nav-link active" href="../pedidos/select_adm_ped.php">
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
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">COMPRAS</h1>
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
              <!--
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            -->
            </div>
          </div>


          <div class="row">
            <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
              INSERTAR PEDIDO
            </div>
            <div class="listado1 col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <!--LISTADO DE EGRESOS-->
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">

            </div>
          </div>

          <hr>
            

            <div class="container">
            
            <div class="row py-2">
              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <p class="datos_cliente_venta">DATOS DEL PROVEEDOR</p>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="../proveedores/select_adm_pro.php" class="estilos_boton_new_cli btn_new"><i class="fas fa-plus"></i>Nuevo proveedor</a>
              </div>
            </div>

            <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos1">
              <input type="hidden" name="action" value="addProveedor">
              <input type="hidden" id="idProveedor" name="idProveedor" value="" required>

              <div class="row py-2">

                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Nit: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="number" id="nit_proveedor" class="form-control" name="nit_proveedor">
                    </div>

                  </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Nombre: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="text" id="nom_proveedor" class="form-control" name="nom_proveedor" disabled required>
                    </div>

                  </div>

                </div>

              </div>
              
              <div class="row py-2">

                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Direccion: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <input type="text" id="dir_proveedor" class="form-control" name="dir_proveedor" disabled required>
                    </div>

                  </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Email: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <input type="text" id="email_proveedor" class="form-control" name="email_proveedor" disabled >
                    </div>

                  </div>

                </div>

              </div>

              <div class="row py-2">

                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Telefono 1: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <input type="text" id="tel1_proveedor" class="form-control" name="tel1_proveedor" disabled required>
                    </div>

                  </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Telefono 2: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <input type="text" id="tel2_proveedor" class="form-control" name="tel2_proveedor" disabled >
                    </div>

                  </div>

                </div>

              </div>

              <div class="row py-2">

                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Regimen: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <input type="text" id="reg_proveedor" class="form-control" name="reg_proveedor" disabled required>
                    </div>

                  </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                </div>

              </div>

            </form>

          </div>

          


          <!--agregar productos-->
          <hr>

          <!--anular o procesar-->
          <div class="row py-2">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
              
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              <div class="mover d-flex justify-content-center">
                <a href="#" class="btn_ok color_boton_anular" id="btn_anular_pedido"><i class="fas fa-ban"></i> Anular</a>
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              <div class="mover d-flex justify-content-center">
                <a href="#" class="btn_new color_boton_procesar" id="btn_facturar_pedido" style="display: none;"><i class="fas fa-ban"></i> Procesar</a>
              </div>
            </div>


          </div>
          <!--fin anular oprocesar-->

          <!--numero de factura-->
          <div class="row py-2">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
              
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              <div class="mover d-flex justify-content-center">
                <p style="font-size: 15px; border: 1px solid black; background: rgb(200,200,200); padding: 4px;">Numero de la factura</p>
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              <div class="mover d-flex justify-content-center">
                <input type="number" name="" style="width: 50px;margin-top: 4px;" placeholder="N°" id="nofac" name="nofac" required>
              </div>
            </div>


          </div>
          <!--fin numero de factura-->

          <!--saldo pendiente-->
          <div class="row py-2">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
              
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              <div class="mover d-flex justify-content-center">
                <p style="font-size: 15px; border: 1px solid #98422E; background: #D88876; padding: 6px;">SALDO PENDIENTE</p>
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
              <div class="mover d-flex justify-content-center">
                <input type="number" name="" style="width: 160px;margin-top: 4px;" placeholder=" $---------" id="deu_pen" name="deu_pen" required>
              </div>
            </div>


          </div>
          <!--fin saldo pendiente-->

          <table class="tbl_venta">
            <thead>
              <tr>
                <th width="100px">Articulo</th>
                <th>Unidad Medida</th>
                <th width="100px">Cantidad</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
                <th>Accion</th>
              </tr>
              <form name="form_new_detalle_pedido" id="form_new_detalle_pedido">
                <tr>

                  <td>
                    <input type="hidden" name="action" value="addDetallePedido">
                    <input type="text" name="txt_art_pedido" id="txt_art_pedido" required>
                  </td>

                  <td><input type="text" name="txt_uni_med_pedido" id="txt_uni_med_pedido" required></td>

                  <td><input type="number" name="txt_cant_pedido" id="txt_cant_pedido" value="0" min="1" style="width: 80px;" required></td>

                  <td><input type="number" name="txt_valor_uni_pedido" id="txt_valor_uni_pedido" value="0" required></td>

                  <td id="txt_precio_total">0.00</td>

                  <td>
                    <input type="submit" name="Agregar" value="Agregar">
                  </td>

                </tr>
              </form>


              <tr>
                <th>Articulo</th>
                <th>Unidad Medida</th>
                <th>Cantidad</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
                <th>Accion</th>
              </tr>
            </thead>

            <tbody id="detalle_venta_pedido">
              
            </tbody>

            <tfoot id="detalle_totales_pedido">
              
            </tfoot>

          </table>
          <!--fin agregar productos-->
                

        </main>
      </div>
    </div>




                <!--FIN DETALLE PEDIDO-->


              <!---->




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
    <script src="../../js/functions.js"></script>
    <script src="../../js/icons.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        var usuarioid='<?php echo $_SESSION['idUser']; ?>';
        serchForDetallePedido(usuarioid);
      });
    </script>
</body>
</html>

<?php }else{
  header('location: ../../salir.php');
} ?>