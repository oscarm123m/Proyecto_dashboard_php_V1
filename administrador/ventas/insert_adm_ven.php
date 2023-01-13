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
            <h1 class="h2">VENTAS CLIENTE EXTERNO</h1>
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
              INSERTAR NUEVA VENTA
            </div>
            <div class="listado1 col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <!--LISTADO DE EGRESOS-->
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
              <div class="mover d-flex justify-content-center">

                <form class="mover d-flex justify-content-end" action="insert_adm_ven_fijo.php">
                  <button class="boton-insertar2-tipo-egreso" type="submit" name="FIJO" >
                    FIJO <i class="fas fa-shopping-cart" ></i>
                  </button>
                </form>
                
              </div>
            </div>
          </div>

          <hr>

          <div class="container">

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="datos_cliente_venta">DATOS DE VENTA</p>
              </div>
            </div>

            <div class="datos2">

              <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                  <p><b>VENDEDOR</b></p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <label>Acciones</label>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                  <p><?php echo$_SESSION['nombre']; ?></p>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <div class="mover d-flex justify-content-center">
                    <div id="acciones_venta">
                      <a href="#" class="btn_ok color_boton_anular" id="btn_anular_venta"><i class="fas fa-ban"></i> Anular</a>
                      <a href="#" class="btn_new color_boton_procesar" id="btn_facturar_venta" style="display: none;"><i class="fas fa-ban"></i> Procesar</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <hr>

          <div class="container">
            
            <div class="row py-2">
              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <p class="datos_cliente_venta">DATOS DEL CLIENTE</p>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="#" class="estilos_boton_new_cli btn_new btn_new_cliente"><i class="fas fa-plus"></i>Nuevo cliente</a>
              </div>
            </div>

            <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos1">
              <input type="hidden" name="action" value="addCliente">
              <input type="hidden" id="idCliente" name="idCliente" value="" required>

              <div class="row py-2">

                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Documento: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="number" id="doc_cliente" class="form-control" name="doc_cliente">
                    </div>

                  </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Nombre: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="text" id="nom_cliente" class="form-control" name="nom_cliente" disabled required>
                    </div>

                  </div>

                </div>

              </div>
              
              <div class="row py-2">

                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Apellidos: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <input type="text" id="ape_cliente" class="form-control" name="ape_cliente" disabled required>
                    </div>

                  </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                  <div class="row">

                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <p class="caja-actualizar-cli">Telefono: </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <input type="number" id="tel_cliente" class="form-control" name="tel_cliente" disabled >
                    </div>

                  </div>

                </div>

              </div>

              <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                  <div class="" id="div_registro_cliente">
                    <center><button type="submit" class="btn_save boton_guardar" id="guardar" disabled><i class="far fa-save fa-lg"></i> Guardar</button></center>
                  </div>

                </div>

              </div>

            </form>

          </div>

          <hr>

          <table class="tbl_venta">
            <thead>
              <tr>
                <th width="100px">Codigo</th>
                <th>Descripcion</th>
                <th>Existencias</th>
                <th width="100px">Cantidad</th>
                <th class="textright">Precio</th>
                <th class="textright">Precio Total</th>
                <th>Accion</th>
              </tr>
              <tr>
                <td><select id="select" name="selectTipo" style="width: 80px;">
                      <option value="0">Seleccione un producto</option>

                        <?php
                          $sql=mysqli_query($con,"select * from producto");
                          while ($res=mysqli_fetch_array($sql)) {
                            echo '<option  value='.$res['IdProducto'].'>'.$res['NombrePro'].' <b style="font-weight: bold;">'.$res['Medida'].'</b></option>';
                          }
                        ?>

                    </select>
                </td>
                <td>
                  <textarea name="txt_descripcion" id="txt_descripcion" cols="15" rows="4" disabled></textarea>
                </td>
                <td id="txt_existencia">-</td>
                <td><input type="text" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" disabled style="width: 80px;"></td>
                <td><input type="text" name="txt_precio" id="txt_precio" value="0" min="1" disabled style="width: 80px;"></td>
                <td id="txt_precio_total" class="textright">0.00</td>
                <td><a href="#" id="add_product_venta" class="link_add color_boton_agregar"><i class="fas fa-plus"></i> Agregar</a></td>
              </tr>


              <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th class="textright">Precio</th>
                <th class="textright">Precio Total</th>
                <th>Accion</th>
              </tr>
            </thead>

            <tbody id="detalle_venta">
              
            </tbody>

            <tfoot id="detalle_totales">
              
            </tfoot>

          </table>


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
    <script type="text/JavaScript" src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/functions.js"></script>
    <script src="../../js/icons.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        var usuarioid='<?php echo $_SESSION['idUser']; ?>';
        serchForDetalle(usuarioid);
      });
    </script>
</body>
</html>

<?php }else{
  header('location: ../../salir.php');
} ?>