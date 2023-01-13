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
            <h1 class="h2">INGRESOS Y EGRESOS MENSUALES</h1>
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
              BALANCE DE INGRESOS Y EGRESOS 
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

          <?php if(isset($_POST['fecha'])){ 
            $busquedapdf1=$_POST['busqueda1'];
            $busquedapdf2=$_POST['busqueda2'];
            if($busquedapdf1<=$busquedapdf2){
          ?>


          <!--buscador ingresos y egresos-->


          <div class="row">
            <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">

            </div>

            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
              
            </div>
            
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
              <form action="pdf_ingresos_egresos.php" method="post" class="form_search" target="_blank">
                <input type="hidden" name="busquedapdf1" value="<?php echo $busquedapdf1; ?>">
                <input type="hidden" name="busquedapdf2" value="<?php echo $busquedapdf2; ?>">
                <button class="imprimir">IMPRIMIR <i class="icon-printer"></i>
                  </button>
              </form>
            </div>
          </div>

            

            <!--inicio grafica-->

            <?php  

              //SELECT MONTH(Fecha) mes, SUM(ValorTotal) Valor FROM venta WHERE year(Fecha)=year(curdate()) GROUP BY mes
              //SELECT Fecha, sum(ValorTotal) FROM venta WHERE year(Fecha)=year(curdate()) group by Fecha ORDER BY Fecha ASC

                //-------------------

              $consulta="SELECT Fecha, SUM(ValorTotal) AS valor FROM venta WHERE Fecha between '$busquedapdf1' AND '$busquedapdf2' AND Estado='Pagada'";
              $result=mysqli_query($con,$consulta);
              $valoresY=array();//Dinero
              $valoresX=array();//Fechas

              while ($ver=mysqli_fetch_row($result)) {
                $valoresY[]=$ver[1];
                $valoresX[]=$ver[0];
              }

              $datosX=json_encode($valoresX);
              $datosY=json_encode($valoresY);

              //--------------------

              $consulta2="SELECT Fecha, SUM(ValorTotal) AS valor FROM egresos WHERE Fecha between '$busquedapdf1' AND '$busquedapdf2' ";
              $result2=mysqli_query($con,$consulta2);
              $valoresY2=array();//Dinero
              $valoresX2=array();//Fechas

              while ($ver2=mysqli_fetch_row($result2)) {
                $valoresY2[]=$ver2[1];
                $valoresX2[]=$ver2[0];
              }

              $datosX2=json_encode($valoresX2);
              $datosY2=json_encode($valoresY2);

              //-----------------

              $consulta3="SELECT Fecha, SUM(ValorTotal) AS valor FROM mantenimiento WHERE Fecha between '$busquedapdf1' AND '$busquedapdf2' ";
              $result3=mysqli_query($con,$consulta3);
              $valoresY3=array();//Dinero
              $valoresX3=array();//Fechas

              while ($ver3=mysqli_fetch_row($result3)) {
                $valoresY3[]=$ver3[1];
                $valoresX3[]=$ver3[0];
              }

              $datosX3=json_encode($valoresX3);
              $datosY3=json_encode($valoresY3);

              //-----------------

              $consulta4="SELECT FechaPago, SUM(ValorTotal) AS valor FROM contratacion WHERE FechaPago between '$busquedapdf1' AND '$busquedapdf2' ";
              $result4=mysqli_query($con,$consulta4);
              $valoresY4=array();//Dinero
              $valoresX4=array();//Fechas

              while ($ver4=mysqli_fetch_row($result4)) {
                $valoresY4[]=$ver4[1];
                $valoresX4[]=$ver4[0];
              }

              $datosX4=json_encode($valoresX4);
              $datosY4=json_encode($valoresY4);

              //-----------------

              $consulta5="SELECT Fecha, SUM(ValorTotal) AS valor FROM pedido WHERE Fecha between '$busquedapdf1' AND '$busquedapdf2'";
              $result5=mysqli_query($con,$consulta5);
              $valoresY5=array();//Dinero
              $valoresX5=array();//Fechas

              while ($ver5=mysqli_fetch_row($result5)) {
                $valoresY5[]=$ver5[1];
                $valoresX5[]=$ver5[0];
              }

              $datosX5=json_encode($valoresX5);
              $datosY5=json_encode($valoresY5);
            ?>


            <div id="graficaLineal">
              
            </div>

            <script type="text/javascript">
              function crearCadenaLineal(json){
                var parsed = JSON.parse(json);
                var arr=[];
                for(var x in parsed){
                  arr.push(parsed[x]);
                }
                return arr;
              }
            </script>

            <!--fin grafica-->

          <!--INFORMACION PROMEDIO 1-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    VENTAS 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>FECHA INICIO</b></td>
                      <td class="th11"><b>FECHA FIN</b></td>
                      <td class="th11"><b>TOTAL</b></td>
                    </tr>

                    <?php
                      $consulta="SELECT Fecha, SUM(ValorTotal) AS valor FROM venta WHERE Fecha between '$busquedapdf1' AND '$busquedapdf2' AND Estado='Pagada'";
                      $ejecutar=mysqli_query($con,$consulta);
                      $i=0;
                      $total000=0;
                      while ($fila=mysqli_fetch_array($ejecutar)) {
                        $ventastotal=$fila['valor'];
                        $i++;
                        $total000=$total000+$ventastotal;

                    ?>

                    <tr>
                      <td class="promedio_anual"><?php echo $i; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf1; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf2; ?></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($ventastotal); ?></td>
                    </tr>

                    <?php
                      }
                      $total000;
                    ?>
                  </table>

                </div>
                <!--FIN VENTAS-->

                <!--PEDIDOS-->

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                  <div class="row py-2">
                    <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      PEDIDOS 
                    </div>

                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                      
                    </div>
                    
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      
                    </div>
                  </div>

                  <table class="tabla_inicio1">
                      <tr>
                        <td class="th11"><b>N°</b></td>
                        <td class="th11"><b>FECHA INICIO</b></td>
                        <td class="th11"><b>FECHA FIN</b></td>
                        <td class="th11"><b>TOTAL</b></td>
                      </tr>

                      <?php
                        $consulta="SELECT Fecha, SUM(ValorTotal) AS valor FROM pedido WHERE Fecha between '$busquedapdf1' AND '$busquedapdf2' ";
                        $ejecutar=mysqli_query($con,$consulta);
                        $i=0;
                        $total00=0;
                        while ($fila=mysqli_fetch_array($ejecutar)) {
                          $ventastotal=$fila['valor'];
                          $i++;
                          $total00=$total00+$ventastotal;


                      ?>

                      <tr>
                        <td class="promedio_anual"><?php echo $i; ?></td>
                        <td class="promedio_anual"><?php echo $busquedapdf1; ?></td>
                        <td class="promedio_anual"><?php echo $busquedapdf2; ?></td>
                        <td class="promedio_anual_valor">$<?php echo number_format($ventastotal); ?></td>
                      </tr>

                      <?php
                        }
                        $total00;
                      ?>

                    </table>

                  </div>

                <!--FIN PEDIDOS-->

              </div>

            </div>
          <!--FIN INFORMACION 1-->

<!--SELECT (SELECT vehiculo.Marca FROM vehiculo WHERE vehiculo.IdVehiculo=mantenimiento.IdVehiculo) AS vehiculos, (SELECT maquinaria.NombreMaq FROM maquinaria WHERE maquinaria.IdMaquinaria=mantenimiento.IdMaquinaria) AS maquinaria FROM mantenimiento-->
<!--SELECT mantenimiento.Fecha, SUM(mantenimiento.ValorTotal) AS valor FROM mantenimiento, vehiculo, maquinaria WHERE mantenimiento.Fecha between date_add(curdate(),interval -30 day) AND curdate()-->
          <!--INFORMACION PROMEDIO 2-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    MANTENIMIENTO 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>FECHA INICIO</b></td>
                      <td class="th11"><b>FECHA FIN</b></td>
                      <td class="th11"><b>TIPO</b></td>
                      <td class="th11"><b>VALOR</b></td>
                    </tr>

                    <?php
                      $consulta="SELECT Recurso, SUM(ValorTotal) AS valor FROM mantenimiento WHERE Fecha between '$busquedapdf1' AND '$busquedapdf2' GROUP BY Recurso";
                      $ejecutar=mysqli_query($con,$consulta);
                      $i=0;
                      $total0=0;
                      while ($fila=mysqli_fetch_array($ejecutar)) {
                        $ventastotal=$fila['valor'];
                        $recurso=$fila['Recurso'];
                        $i++;
                        $total0=$total0+$ventastotal;


                    ?>

                    <tr>
                      <td class="promedio_anual"><?php echo $i; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf1; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf2; ?></td>
                      <td class="promedio_anual"><?php echo $recurso; ?></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($ventastotal); ?></td>
                    </tr>

                    <?php
                      }
                    ?>
                    <tr>
                      <td colspan="4" class="total_inicio">VALOR TOTAL =
                      </td>
                      <td class="total_inicio_numero">$<?php echo number_format($total0); ?></td>
                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 2-->

          <!--INFORMACION PROMEDIO 3-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    GASTOS FIJOS
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>BODEGA</b></td>
                      <td class="th11"><b>FECHA INICIO</b></td>
                      <td class="th11"><b>FECHA FIN</b></td>
                      <td class="th11"><b>VALOR</b></td>
                    </tr>

                    <?php
                      $consulta="SELECT (SELECT bodega.NombreB FROM bodega WHERE bodega.IdBodega=egresos.IdBodega) AS nombre, SUM(egresos.ValorTotal) AS valor FROM egresos WHERE Fecha between '$busquedapdf1' AND '$busquedapdf2' GROUP BY egresos.IdBodega";
                      $ejecutar=mysqli_query($con,$consulta);
                      $i=0;
                      $total1=0;
                      while ($fila=mysqli_fetch_array($ejecutar)) {
                        $nombre=$fila['nombre'];
                        $valor1=$fila['valor'];
                        $i++;
                        $total1=$total1+$valor1;


                    ?>

                    <tr>
                      <td class="promedio_anual"><?php echo $i; ?></td>
                      <td class="promedio_anual"><?php echo $nombre; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf1; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf2; ?></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($valor1); ?></td>
                    </tr>

                    <?php
                      }
                    ?>
                    <tr>
                      <td colspan="4" class="total_inicio">VALOR TOTAL =
                      </td>
                      <td class="total_inicio_numero">$<?php echo number_format($total1); ?></td>
                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 3-->


          <!--INFORMACION PROMEDIO 4-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    CONTRATACION 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>CARGO</b></td>
                      <td class="th11"><b>FECHA INICIO</b></td>
                      <td class="th11"><b>FECHA FIN</b></td>
                      <td class="th11"><b>VALOR</b></td>
                    </tr>

                    <?php
                      $consulta="SELECT SUM(contratacion.ValorTotal) AS valor, (SELECT cargo.NombreC FROM cargo WHERE cargo.IdCargo=persona.IdCargo) cargo FROM persona, contratacion WHERE contratacion.FechaPago between '$busquedapdf1' AND '$busquedapdf2' AND persona.IdPersona=contratacion.IdPersona GROUP BY persona.IdCargo";
                      $ejecutar=mysqli_query($con,$consulta);
                      $i=0;
                      $total2=0;
                      while ($fila=mysqli_fetch_array($ejecutar)) {
                        $cargo=$fila['cargo'];
                        $valor2=$fila['valor'];
                        $i++;
                        $total2=$total2+$valor2;


                    ?>

                    <tr>
                      <td class="promedio_anual"><?php echo $i; ?></td>
                      <td class="promedio_anual"><?php echo $cargo; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf1; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf2; ?></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($valor2); ?></td>
                    </tr>

                    <?php
                      }
                    ?>
                    <tr>
                      <td colspan="4" class="total_inicio">VALOR TOTAL =
                      </td>
                      <td class="total_inicio_numero">$<?php echo number_format($total2); ?></td>
                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 4-->

          <!--INFORMACION PROMEDIO 5-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    DEUDORES 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>TIPO</b></td>
                      <td class="th11"><b>FECHA INICIO</b></td>
                      <td class="th11"><b>FECHA FIN</b></td>
                      <td class="th11"><b>VALOR</b></td>
                    </tr>

                    <?php
                      $consulta_1="SELECT Fecha, SUM(SaldoPendiente) AS valor FROM pago WHERE Fecha between '$busquedapdf1' AND '$busquedapdf2' AND Estado='Debe'";
                      $ejecutar_1=mysqli_query($con,$consulta_1);
                      while ($fila_1=mysqli_fetch_array($ejecutar_1)) {
                        $valor2=$fila_1['valor'];


                    ?>

                    <tr>
                      <td class="promedio_anual">1</td>
                      <td class="promedio_anual">ULTIMO</td>
                      <td class="promedio_anual"><?php echo $busquedapdf1; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf2; ?></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($valor2); ?></td>
                    </tr>

                    <?php
                      }
                    ?>

                    <?php
                      $consulta_2="SELECT Fecha, SUM(SaldoPendiente) AS valor FROM pago WHERE Estado='Debe'";
                      $ejecutar_2=mysqli_query($con,$consulta_2);
                      $total22=0;
                      while ($fila_2=mysqli_fetch_array($ejecutar_2)) {
                        $valor22=$fila_2['valor'];
                        $total22=$total22+$valor22;

                        
                    ?>

                    <tr>
                      <td class="promedio_anual">2</td>
                      <td class="promedio_anual"><B>TOTAL</B></td>
                      <td class="promedio_anual" colspan="2"><B>VALOR PENDIENTE</B></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($valor22); ?></td>
                    </tr>

                    <?php
                      }
                    ?>

                    <tr>
                      <td colspan="4" class="total_inicio">VALOR REAL DEUDORES =
                      </td>
                      <td class="total_inicio_numero">$<?php echo number_format($total22); ?></td>
                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 5-->

          <?php 
          $egresos_totales=$total2+$total1+$total0+$total00;
          ?>


          <!--INFORMACION PROMEDIO 6-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-3">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    BALANCE GENERAL 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th12"><b>N°</b></td>
                      <td class="th12"><b>TIPO</b></td>
                      <td class="th12"><b>FECHA INICIO</b></td>
                      <td class="th12"><b>FECHA FIN</b></td>
                      <td class="th12"><b>VALOR</b></td>
                    </tr>

                    <tr>
                      <td class="promedio_anual">1</td>
                      <td class="promedio_anual">TOTAL GASTOS</td>
                      <td class="promedio_anual"><?php echo $busquedapdf1; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf2; ?></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($egresos_totales); ?></td>
                    </tr>

                    <tr>
                      <td class="promedio_anual">2</td>
                      <td class="promedio_anual">VENTAS</td>
                      <td class="promedio_anual"><?php echo $busquedapdf1; ?></td>
                      <td class="promedio_anual"><?php echo $busquedapdf2; ?></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($total000); ?></td>
                    </tr>

                    <tr>
                      <td class="promedio_anual">3</td>
                      <td class="promedio_anual"><b>DEUDORES</b></td>
                      <td class="promedio_anual" colspan="2"><b>VALOR PENDIENTE</b></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($total22); ?></td>
                    </tr>

                    <?php 
                    $ganancias=$total000-$egresos_totales;
                    ?>
                    <tr>
                      <th></th>
                    </tr>

                    <tr>
                      <td colspan="4" class="total_inicio">GANANCIAS =
                      </td>

                      <td class="total_inicio_numero" style="border: 1px solid black; background: rgb(220,220,220); text-align: center;">$<?php echo number_format($ganancias); ?></td>

                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 6-->


          <!--fin buscador ingresos y egresos-->


          <?php }else{
            echo "<script>alert('¡ERROR!  fecha incorrecta')</script>";
            echo "<script>window.open('ingresos_egresos.php','_self')</script>";
          } ?>

          <?php }else if(!isset($_POST['fecha'])){ ?>


            <div class="row">
            <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">

            </div>

            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
              
            </div>
            
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
              <?php
                $y=mysqli_query($con,"SELECT Fecha, SUM(ValorTotal) AS valor FROM venta WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate() AND Estado='Pagada'");
                $x=mysqli_fetch_array($y);
                $fecha_30=$x['Fecha'];

                //hora
                $timezone="America/Bogota";
                $dt=new datetime("now",new datetimezone($timezone));
                 gmdate("Y/m/d H:i:s",(time()+$dt->getOffset()));

                $fecha_zona=gmdate("Y/m/d",(time()+$dt->getOffset()));

              ?>
              <form action="pdf_ingresos_egresos.php" method="post" class="form_search" target="_blank">
                <input type="hidden" name="busquedapdf1" value="<?php echo $fecha_30; ?>">
                <input type="hidden" name="busquedapdf2" value="<?php echo $fecha_zona; ?>">
                <button class="imprimir">IMPRIMIR <i class="icon-printer"></i>
                  </button>
              </form>
            </div>
          </div>

            

            <!--inicio grafica-->

            <?php  

              //SELECT MONTH(Fecha) mes, SUM(ValorTotal) Valor FROM venta WHERE year(Fecha)=year(curdate()) GROUP BY mes
              //SELECT Fecha, sum(ValorTotal) FROM venta WHERE year(Fecha)=year(curdate()) group by Fecha ORDER BY Fecha ASC


              //--------------------------

              $consulta="SELECT Fecha, SUM(ValorTotal) AS valor FROM venta WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate() AND Estado='Pagada'";
              $result=mysqli_query($con,$consulta);
              $valoresY=array();//Dinero
              $valoresX=array();//Fechas

              while ($ver=mysqli_fetch_row($result)) {
                $valoresY[]=$ver[1];
                $valoresX[]=$ver[0];
              }

              $datosX=json_encode($valoresX);
              $datosY=json_encode($valoresY);

              //--------------------

              $consulta2="SELECT Fecha, SUM(ValorTotal) AS valor FROM egresos WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate()";
              $result2=mysqli_query($con,$consulta2);
              $valoresY2=array();//Dinero
              $valoresX2=array();//Fechas

              while ($ver2=mysqli_fetch_row($result2)) {
                $valoresY2[]=$ver2[1];
                $valoresX2[]=$ver2[0];
              }

              $datosX2=json_encode($valoresX2);
              $datosY2=json_encode($valoresY2);

              //-----------------

              $consulta3="SELECT Fecha, SUM(ValorTotal) AS valor FROM mantenimiento WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate()";
              $result3=mysqli_query($con,$consulta3);
              $valoresY3=array();//Dinero
              $valoresX3=array();//Fechas

              while ($ver3=mysqli_fetch_row($result3)) {
                $valoresY3[]=$ver3[1];
                $valoresX3[]=$ver3[0];
              }

              $datosX3=json_encode($valoresX3);
              $datosY3=json_encode($valoresY3);

              //-----------------

              $consulta4="SELECT FechaPago, SUM(ValorTotal) AS valor FROM contratacion WHERE FechaPago between date_add(curdate(),interval -30 day) AND curdate()";
              $result4=mysqli_query($con,$consulta4);
              $valoresY4=array();//Dinero
              $valoresX4=array();//Fechas

              while ($ver4=mysqli_fetch_row($result4)) {
                $valoresY4[]=$ver4[1];
                $valoresX4[]=$ver4[0];
              }

              $datosX4=json_encode($valoresX4);
              $datosY4=json_encode($valoresY4);

              //-----------------

              $consulta5="SELECT Fecha, SUM(ValorTotal) AS valor FROM pedido WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate()";
              $result5=mysqli_query($con,$consulta5);
              $valoresY5=array();//Dinero
              $valoresX5=array();//Fechas

              while ($ver5=mysqli_fetch_row($result5)) {
                $valoresY5[]=$ver5[1];
                $valoresX5[]=$ver5[0];
              }

              $datosX5=json_encode($valoresX5);
              $datosY5=json_encode($valoresY5);
            ?>


            <div id="graficaLineal">
              
            </div>

            <script type="text/javascript">
              function crearCadenaLineal(json){
                var parsed = JSON.parse(json);
                var arr=[];
                for(var x in parsed){
                  arr.push(parsed[x]);
                }
                return arr;
              }
            </script>

            <!--fin grafica-->

          <!--INFORMACION PROMEDIO 1-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    VENTAS 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>FECHA</b></td>
                      <td class="th11"><b>TOTAL</b></td>
                    </tr>

                    <?php
                      $consulta="SELECT Fecha, SUM(ValorTotal) AS valor FROM venta WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate() AND Estado='Pagada'";
                      $ejecutar=mysqli_query($con,$consulta);
                      $i=0;
                      $total000=0;
                      while ($fila=mysqli_fetch_array($ejecutar)) {
                        $ventastotal=$fila['valor'];
                        $i++;
                        $total000=$total000+$ventastotal;

                    ?>

                    <tr>
                      <td class="promedio_anual"><?php echo $i; ?></td>
                      <td class="promedio_anual">DE HACE 30 DIAS</td>
                      <td class="promedio_anual_valor">$<?php echo number_format($ventastotal); ?></td>
                    </tr>

                    <?php
                      }
                      $total000;
                    ?>
                  </table>

                </div>
                <!--FIN VENTAS-->

                <!--PEDIDOS-->

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                  <div class="row py-2">
                    <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      PEDIDOS 
                    </div>

                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                      
                    </div>
                    
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      
                    </div>
                  </div>

                  <table class="tabla_inicio1">
                      <tr>
                        <td class="th11"><b>N°</b></td>
                        <td class="th11"><b>FECHA</b></td>
                        <td class="th11"><b>TOTAL</b></td>
                      </tr>

                      <?php
                        $consulta="SELECT Fecha, SUM(ValorTotal) AS valor FROM pedido WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate()";
                        $ejecutar=mysqli_query($con,$consulta);
                        $i=0;
                        $total00=0;
                        while ($fila=mysqli_fetch_array($ejecutar)) {
                          $ventastotal=$fila['valor'];
                          $i++;
                          $total00=$total00+$ventastotal;


                      ?>

                      <tr>
                        <td class="promedio_anual"><?php echo $i; ?></td>
                        <td class="promedio_anual">DE HACE 30 DIAS</td>
                        <td class="promedio_anual_valor">$<?php echo number_format($ventastotal); ?></td>
                      </tr>

                      <?php
                        }
                        $total00;
                      ?>

                    </table>

                  </div>

                <!--FIN PEDIDOS-->

              </div>

            </div>
          <!--FIN INFORMACION 1-->

<!--SELECT (SELECT vehiculo.Marca FROM vehiculo WHERE vehiculo.IdVehiculo=mantenimiento.IdVehiculo) AS vehiculos, (SELECT maquinaria.NombreMaq FROM maquinaria WHERE maquinaria.IdMaquinaria=mantenimiento.IdMaquinaria) AS maquinaria FROM mantenimiento-->
<!--SELECT mantenimiento.Fecha, SUM(mantenimiento.ValorTotal) AS valor FROM mantenimiento, vehiculo, maquinaria WHERE mantenimiento.Fecha between date_add(curdate(),interval -30 day) AND curdate()-->
          <!--INFORMACION PROMEDIO 2-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    MANTENIMIENTO 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>FECHA</b></td>
                      <td class="th11"><b>TIPO</b></td>
                      <td class="th11"><b>VALOR</b></td>
                    </tr>

                    <?php
                      $consulta="SELECT Recurso, SUM(ValorTotal) AS valor FROM mantenimiento WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate() GROUP BY Recurso";
                      $ejecutar=mysqli_query($con,$consulta);
                      $i=0;
                      $total0=0;
                      while ($fila=mysqli_fetch_array($ejecutar)) {
                        $ventastotal=$fila['valor'];
                        $recurso=$fila['Recurso'];
                        $i++;
                        $total0=$total0+$ventastotal;


                    ?>

                    <tr>
                      <td class="promedio_anual"><?php echo $i; ?></td>
                      <td class="promedio_anual">DE HACE 30 DIAS</td>
                      <td class="promedio_anual"><?php echo $recurso; ?></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($ventastotal); ?></td>
                    </tr>

                    <?php
                      }
                    ?>
                    <tr>
                      <td colspan="3" class="total_inicio">VALOR TOTAL =
                      </td>
                      <td class="total_inicio_numero">$<?php echo number_format($total0); ?></td>
                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 2-->

          <!--INFORMACION PROMEDIO 3-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    GASTOS FIJOS 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>BODEGA</b></td>
                      <td class="th11"><b>FECHA</b></td>
                      <td class="th11"><b>VALOR</b></td>
                    </tr>

                    <?php
                      $consulta="SELECT (SELECT bodega.NombreB FROM bodega WHERE bodega.IdBodega=egresos.IdBodega) AS nombre, SUM(egresos.ValorTotal) AS valor FROM egresos WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate() GROUP BY egresos.IdBodega";
                      $ejecutar=mysqli_query($con,$consulta);
                      $i=0;
                      $total1=0;
                      while ($fila=mysqli_fetch_array($ejecutar)) {
                        $nombre=$fila['nombre'];
                        $valor1=$fila['valor'];
                        $i++;
                        $total1=$total1+$valor1;


                    ?>

                    <tr>
                      <td class="promedio_anual"><?php echo $i; ?></td>
                      <td class="promedio_anual"><?php echo $nombre; ?></td>
                      <td class="promedio_anual">DE HACE 30 DIAS</td>
                      <td class="promedio_anual_valor">$<?php echo number_format($valor1); ?></td>
                    </tr>

                    <?php
                      }
                    ?>
                    <tr>
                      <td colspan="3" class="total_inicio">VALOR TOTAL =
                      </td>
                      <td class="total_inicio_numero">$<?php echo number_format($total1); ?></td>
                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 3-->


          <!--INFORMACION PROMEDIO 4-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    CONTRATACION 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>CARGO</b></td>
                      <td class="th11"><b>FECHA</b></td>
                      <td class="th11"><b>VALOR</b></td>
                    </tr>

                    <?php
                      $consulta="SELECT SUM(contratacion.ValorTotal) AS valor, (SELECT cargo.NombreC FROM cargo WHERE cargo.IdCargo=persona.IdCargo) cargo FROM persona, contratacion WHERE contratacion.FechaPago between date_add(curdate(),interval -30 day) AND curdate() AND persona.IdPersona=contratacion.IdPersona GROUP BY persona.IdCargo";
                      $ejecutar=mysqli_query($con,$consulta);
                      $i=0;
                      $total2=0;
                      while ($fila=mysqli_fetch_array($ejecutar)) {
                        $cargo=$fila['cargo'];
                        $valor2=$fila['valor'];
                        $i++;
                        $total2=$total2+$valor2;


                    ?>

                    <tr>
                      <td class="promedio_anual"><?php echo $i; ?></td>
                      <td class="promedio_anual"><?php echo $cargo; ?></td>
                      <td class="promedio_anual">DE HACE 30 DIAS</td>
                      <td class="promedio_anual_valor">$<?php echo number_format($valor2); ?></td>
                    </tr>

                    <?php
                      }
                    ?>
                    <tr>
                      <td colspan="3" class="total_inicio">VALOR TOTAL =
                      </td>
                      <td class="total_inicio_numero">$<?php echo number_format($total2); ?></td>
                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 4-->

          <!--INFORMACION PROMEDIO 5-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-2">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    DEUDORES 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th11"><b>N°</b></td>
                      <td class="th11"><b>TIPO</b></td>
                      <td class="th11"><b>FECHA</b></td>
                      <td class="th11"><b>VALOR</b></td>
                    </tr>

                    <?php
                      $consulta_1="SELECT Fecha, SUM(SaldoPendiente) AS valor FROM pago WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate() AND Estado='Debe'";
                      $ejecutar_1=mysqli_query($con,$consulta_1);
                      while ($fila_1=mysqli_fetch_array($ejecutar_1)) {
                        $valor2=$fila_1['valor'];


                    ?>

                    <tr>
                      <td class="promedio_anual">1</td>
                      <td class="promedio_anual">ULTIMO</td>
                      <td class="promedio_anual">DE HACE 30 DIAS</td>
                      <td class="promedio_anual_valor">$<?php echo number_format($valor2); ?></td>
                    </tr>

                    <?php
                      }
                    ?>

                    <?php
                      $consulta_2="SELECT Fecha, SUM(SaldoPendiente) AS valor FROM pago WHERE Estado='Debe'";
                      $ejecutar_2=mysqli_query($con,$consulta_2);
                      $total22=0;
                      while ($fila_2=mysqli_fetch_array($ejecutar_2)) {
                        $valor22=$fila_2['valor'];
                        $total22=$total22+$valor22;

                        
                    ?>

                    <tr>
                      <td class="promedio_anual">2</td>
                      <td class="promedio_anual"><B>TOTAL</B></td>
                      <td class="promedio_anual"><B>VALOR PENDIENTE</B></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($valor22); ?></td>
                    </tr>

                    <?php
                      }
                    ?>

                    <tr>
                      <td colspan="3" class="total_inicio">VALOR REAL DEUDORES =
                      </td>
                      <td class="total_inicio_numero">$<?php echo number_format($total22); ?></td>
                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 5-->

          <?php 
          $egresos_totales=$total2+$total1+$total0+$total00;
          ?>


          <!--INFORMACION PROMEDIO 6-->

          <div class="container">

            <div class="row">

              <!--VENTAS-->

              <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <div class="row py-3">
                  <div class="listado3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    BALANCE GENERAL 
                  </div>

                  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    
                  </div>
                  
                  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    
                  </div>
                </div>

                <table class="tabla_inicio1">
                    <tr>
                      <td class="th12"><b>N°</b></td>
                      <td class="th12"><b>TIPO</b></td>
                      <td class="th12"><b>FECHA</b></td>
                      <td class="th12"><b>VALOR</b></td>
                    </tr>

                    <tr>
                      <td class="promedio_anual">1</td>
                      <td class="promedio_anual">TOTAL GASTOS</td>
                      <td class="promedio_anual">DE HACE 30 DIAS</td>
                      <td class="promedio_anual_valor">$<?php echo number_format($egresos_totales); ?></td>
                    </tr>

                    <tr>
                      <td class="promedio_anual">2</td>
                      <td class="promedio_anual">VENTAS</td>
                      <td class="promedio_anual">DE HACE 30 DIAS</td>
                      <td class="promedio_anual_valor">$<?php echo number_format($total000); ?></td>
                    </tr>

                    <tr>
                      <td class="promedio_anual">3</td>
                      <td class="promedio_anual"><b>DEUDORES</b></td>
                      <td class="promedio_anual"><b>VALOR PENDIENTE</b></td>
                      <td class="promedio_anual_valor">$<?php echo number_format($total22); ?></td>
                    </tr>

                    <?php 
                    $ganancias=$total000-$egresos_totales;
                    ?>
                    <tr>
                      <th></th>
                    </tr>

                    <tr>
                      <td colspan="3" class="total_inicio">GANANCIAS =
                      </td>

                      <td class="total_inicio_numero" style="border: 1px solid black; background: rgb(220,220,220); text-align: center;">$<?php echo number_format($ganancias); ?></td>

                    </tr>
                  </table>

                </div>
                <!--FIN VENTAS-->

              </div>

            </div>
          <!--FIN INFORMACION 6-->

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
    <?php if(isset($_POST['fecha'])){ ?>
    <script type="text/javascript">

      datosX=crearCadenaLineal('<?php echo $datosX ?>');
      datosY=crearCadenaLineal('<?php echo $datosY ?>');
      //------------------
      datosX2=crearCadenaLineal('<?php echo $datosX2 ?>');
      datosY2=crearCadenaLineal('<?php echo $datosY2 ?>');
      //------------------
      datosX3=crearCadenaLineal('<?php echo $datosX3 ?>');
      datosY3=crearCadenaLineal('<?php echo $datosY3 ?>');
      //------------------
      datosX4=crearCadenaLineal('<?php echo $datosX4 ?>');
      datosY4=crearCadenaLineal('<?php echo $datosY4 ?>');
      //------------------
      datosX5=crearCadenaLineal('<?php echo $datosX5 ?>');
      datosY5=crearCadenaLineal('<?php echo $datosY5 ?>');

      /*var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter'
      };


      var data = [trace1];

      Plotly.newPlot('graficaLineal', data);*/

      var trace1 = {
        x: ['RESULTADOS'],
        y: datosY,
        name: 'ENTRADAS',
        type: 'bar'
      };

      var trace5 = {
        x: ['RESULTADOS'],
        y: datosY2,
        name: 'GASTOS FIJOS',
        type: 'bar'
      };

      var trace2 = {
        x: ['RESULTADOS'],
        y: datosY5,
        name: 'COMPRAS',
        type: 'bar'
      };


      var trace4 = {
        x: ['RESULTADOS'],
        y: datosY4,
        name: 'NOMINA',
        type: 'bar'
      };

      var trace3 = {
        x: ['RESULTADOS'],
        y: datosY3,
        name: 'MANTENIMIENTO',
        type: 'bar'
      };


      var data = [trace1, trace2, trace5, trace4,trace3];

      var layout = {
        title: 'RESULTADOS'
      };

      Plotly.newPlot('graficaLineal', data, layout);

    </script>
    <?php }else if(!isset($_POST['fecha'])){ ?>
      <script type="text/javascript">

      datosX=crearCadenaLineal('<?php echo $datosX ?>');
      datosY=crearCadenaLineal('<?php echo $datosY ?>');
      //------------------
      datosX2=crearCadenaLineal('<?php echo $datosX2 ?>');
      datosY2=crearCadenaLineal('<?php echo $datosY2 ?>');
      //------------------
      datosX3=crearCadenaLineal('<?php echo $datosX3 ?>');
      datosY3=crearCadenaLineal('<?php echo $datosY3 ?>');
      //------------------
      datosX4=crearCadenaLineal('<?php echo $datosX4 ?>');
      datosY4=crearCadenaLineal('<?php echo $datosY4 ?>');
      //------------------
      datosX5=crearCadenaLineal('<?php echo $datosX5 ?>');
      datosY5=crearCadenaLineal('<?php echo $datosY5 ?>');

      /*var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter'
      };


      var data = [trace1];

      Plotly.newPlot('graficaLineal', data);*/

      var trace1 = {
        x: ['Hace 30 dias'],
        y: datosY,
        name: 'ENTRADAS',
        type: 'bar'
      };

      var trace5 = {
        x: ['Hace 30 dias'],
        y: datosY2,
        name: 'GASTOS FIJOS',
        type: 'bar'
      };

      var trace2 = {
        x: ['Hace 30 dias'],
        y: datosY5,
        name: 'COMPRAS',
        type: 'bar'
      };


      var trace4 = {
        x: ['Hace 30 dias'],
        y: datosY4,
        name: 'NOMINA',
        type: 'bar'
      };

      var trace3 = {
        x: ['Hace 30 dias'],
        y: datosY3,
        name: 'MANTENIMIENTO',
        type: 'bar'
      };


      var data = [trace1, trace2, trace5, trace4,trace3];

      var layout = {
        title: 'ULTIMOS 30 DIAS'
      };

      Plotly.newPlot('graficaLineal', data, layout);

    </script>
    <?php }?>



</body>
</html>

<?php }else{
  header('location: ../../salir.php');
} ?>

<!--SELECT SUM(ValorTotal) AS valor FROM venta WHERE Fecha between date_add(curdate(),interval -30 day) AND curdate() ORDER BY Fecha-->