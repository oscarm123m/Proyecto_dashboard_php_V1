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
        <a class="py-2 d-none d-md-inline-block" href="ingresos_egresos.php">
          <span data-feather="bar-chart-2"></span>   INGRESOS Y EGRESOS MENSUALES</a>
        <a class="py-2 d-none d-md-inline-block" href="inventario.php">
          <span data-feather="clipboard"></span>   INVENTARIO</a>
        <a class="py-2 d-none d-md-inline-block" href="deudores.php">
          <span data-feather="list"></span>   DEUDORES</a>
        <a class="py-2 d-none d-md-inline-block" href="ventas.php">
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
            <h1 class="h2">VENTAS</h1>
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
              LISTADO DE VENTAS 
              <?php if(isset($_POST['fecha'])) {
                $busqueda1=$_POST['busqueda1'];
                $busqueda2=$_POST['busqueda2'];
                echo 'ENTRE '.$busqueda1.' Y '.$busqueda2.'';
              } 
              ?>
            </div>

            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
              
            </div>
            
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
              <form action="" method="post" class="form_search">
                <h7><b>ENTRE</b></h7>
                <input class="espacio_buscar" type="date" name="busqueda1" required> <h7><b>Y</b></h7>
                <input class="espacio_buscar1" type="date" name="busqueda2" required>
                <input type="submit" value="BUSCAR" class="btn_search" name="fecha">
              </form>
            </div>
          </div>

          <div class="row">
            <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
              
            </div>

            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
              
            </div>
            
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
              <form class="mover d-flex justify-content-end" name="insert" method="post" action="historicos.php">
                  <button class="boton-insertar2-tipo-egreso2" type="submit" name="HISTORICOS" >
                    HISTORICOS <i class="fa fa-history" aria-hidden="true"></i>
                  </button>
                </form>
            </div>
          </div>

          <?php if(isset($_POST['fecha'])){ 
            $busquedapdf1=$_POST['busqueda1'];
            $busquedapdf2=$_POST['busqueda2'];
            if($busquedapdf1<=$busquedapdf2){
            ?>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-end">
                  <form action="pdf_ventas.php" method="post" class="form_search" target="_blank">
                    <input type="hidden" name="busquedapdf1" value="<?php echo $busquedapdf1; ?>">
                    <input type="hidden" name="busquedapdf2" value="<?php echo $busquedapdf2; ?>">
                    <button class="imprimir">IMPRIMIR <i class="icon-printer"></i>
                      </button>
                  </form>
                </div>
              </div>
            </div>

          <!--grafica-->
            
          
      <!--fin grafica-->

          <div class="espacio_tabla_ventas">
              <div>
                <table>
                  <tr>
                    <td class=" tamaño_fila1"><b>N°</b></td>
                    <td class=" tamaño_fila1"><b>FECHA</b></td>
                    <td class=" tamaño_fila1"><b>VALOR TOTAL</b></td>
                    <td class=" tamaño_fila1"><b>HISTORIAL</b></td>
                  </tr>

                  <?php

                    

                      $consulta="SELECT Fecha, sum(ValorTotal) AS Valor FROM venta WHERE Fecha BETWEEN '$busquedapdf1' AND '$busquedapdf2' AND Estado='Pagada' group by Fecha ORDER BY Fecha DESC";
                      $ejecutar=mysqli_query($con,$consulta);
                      $i=0;
                      while ($fila=mysqli_fetch_array($ejecutar)) {
                        $fecha=$fila['Fecha'];
                        $valor=$fila['Valor'];
                        $i++;
                  ?>

                  <tr>
                    <td class="tamaño_fila"><?php echo $i; ?></td>
                    <td class="tamaño_fila"><?php echo $fecha; ?></td>
                    <td class="tamaño_fila"><b>$ <?php echo number_format($valor); ?></b></td>

                    <td>
                      <form action="historial.php" method="post">
                        <input type="hidden" name="fecha_venta" value="<?php echo $fecha; ?>">
                        <input type="submit" name="historial" class="btn-actualizar" value="VER HISTORIAL">
                      </form>
                    </td>

                  </tr>
                  <?php
                    }
                  ?>

                </table>

              

              </div>

          </div>

          <?php } else {
                echo "<script>alert('¡ERROR!  fecha incorrecta')</script>";
                echo "<script>window.open('ventas.php','_self')</script>";
                }
          ?>

        <?php }?>

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
    <script src="../../js/plotly-latest.min.js"></script>
</body>
</html>

<?php }else{
  header('location: ../../salir.php');
} ?>