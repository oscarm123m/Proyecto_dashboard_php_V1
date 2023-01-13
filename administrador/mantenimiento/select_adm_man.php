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
    if (empty($_POST['selectVehiculo']) || empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['txtFecha']) || empty($_POST['txtValor'])) {
      //$alert='<p class="msg_error">Algunos campos son abligatorios</p>';
    } else {

      include("../../conexiones/conexion.php");

      $vehiculo=$_POST['selectVehiculo'];
      $nombre=$_POST['txtNombre'];
      $descripcion=$_POST['txtDescripcion'];
      $fecha=$_POST['txtFecha'];
      $valor=$_POST['txtValor'];

      $sql1=mysqli_query($con,"INSERT INTO mantenimiento(IdVehiculo,Nombre,Descripcion,Fecha,ValorTotal,Recurso) VALUES('$vehiculo','$nombre','$descripcion','$fecha','$valor','Vehiculo')");
      if ($sql1) {
        echo "<script>alert('Registro Insertado')</script>";
        echo "<script>window.open('select_adm_man.php','_self')</script>";
      }else{
        echo "<script>alert('Error')</script>";
      }
    }
  }



  if (!empty($_POST)) {
    if (empty($_POST['selectMaquinaria']) || empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['txtFecha']) || empty($_POST['txtValor'])) {
      //$alert='<p class="msg_error">Algunos campos son abligatorios</p>';
    } else {

      include("../../conexiones/conexion.php");

      $maquinaria=$_POST['selectMaquinaria'];
      $nombre=$_POST['txtNombre'];
      $descripcion=$_POST['txtDescripcion'];
      $fecha=$_POST['txtFecha'];
      $valor=$_POST['txtValor'];

      $sql1=mysqli_query($con,"INSERT INTO mantenimiento(IdMaquinaria, Nombre, Descripcion, Fecha, ValorTotal, Recurso) VALUES('$maquinaria','$nombre','$descripcion','$fecha','$valor','Maquinaria')");
      if ($sql1) {
        echo "<script>alert('Registro Insertado')</script>";
        echo "<script>window.open('select_adm_man.php','_self')</script>";
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
                <a class="nav-link active" href="../mantenimiento/select_adm_man.php">
                  <span data-feather="dollar-sign"></span>
                  MANTENIMIENTO
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">MANTENIMIENTO</h1>
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


          <!--EJEMPLO UNO-->
          
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">MANTENIMIENTO VEHICULO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">MANTENIMIENTO MAQUINARIA</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              
              <div class="row py-2 listado1_man">

                <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  LISTADO DE MANTENIMIENTO DE VEHICULOS
                </div>

                <div class="listado1 col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <!--LISTADO DE EGRESOS-->
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <div class="mover d-flex justify-content-center">
                    <?php if($_SESSION['rol']==1){ ?>
                    <form class="mover d-flex justify-content-end" name="insert" method="post" action="select_adm_veh.php">
                      <button class="boton-insertar2-vehiculo" type="submit" name="VEHICULO" >
                        VEHICULO <i class="fas fa-truck" ></i>
                      </button>
                    </form>
                    <?php } ?>
                    <button class="boton3-ini-nuevo" data-toggle="modal" data-target="#new_man_veh"> NUEVO <i class="fas fa-plus"></i> </button>

                  </div>
                </div>
              </div>

              <div>
                <form method="post" action="">
                  <div class="table-responsive">
                    <table>
                      <tr>
                        <td class="th1"><b>N°</b></td>
                        <td class="th1"><b>VEHICULO</b></td>
                        <td class="th1"><b>NOMBRE</b></td>
                        <td class="th1"><b>DESCRIPCION</b></td>
                        <td class="th1"><b>FECHA</b></td>
                        <td class="th1"><b>VALOR TOTAL</b></td>
                        <td class="th1"><b>ACTUALIZAR</b></td>
                        <?php if($_SESSION['rol']==1){ ?>
                        <td class="th1"><b></b></td>
                        <?php } ?>
                      </tr>

                      <?php
                      $sql_registe_m_v=mysqli_query($con,"SELECT COUNT(*) AS cantidad FROM mantenimiento WHERE Recurso='Vehiculo'");
                      $result_register_m_v=mysqli_fetch_array($sql_registe_m_v);
                      $numero_m_v=$result_register_m_v['cantidad'];

                      $por_pagina=10;
                      if (empty($_GET['pagina_m_v'])) {
                        $pagina_m_v=1;
                      }else{
                        $pagina_m_v=$_GET['pagina_m_v'];
                      }

                      $desde_m_v=($pagina_m_v-1)*$por_pagina;
                      $total_pagina_m_v=ceil($numero_m_v / $por_pagina);


                        $consulta="SELECT * FROM mantenimiento,vehiculo WHERE vehiculo.IdVehiculo=mantenimiento.IdVehiculo AND Recurso='Vehiculo' ORDER BY mantenimiento.IdMantenimiento DESC LIMIT $desde_m_v,$por_pagina";
                        $ejecutar=mysqli_query($con,$consulta);
                        $i=0;
                        while ($fila=mysqli_fetch_array($ejecutar)) {
                          $idmantenimiento=$fila['IdMantenimiento'];
                          $idvehiculovehiculo=$fila['IdVehiculo'];
                          $idvehiculotipo=$fila['Tipo'];
                          $idvehiculomarca=$fila['Marca'];
                          $nombre=$fila['Nombre'];
                          $descripcion=$fila['Descripcion'];
                          $fecha=$fila['Fecha'];
                          $valortotal=$fila['ValorTotal'];
                          $i++;
                          $in=$i+$desde_m_v;
                      ?>

                      <tr>
                        <td><?php echo $in; ?></td>
                        <td><b><?php echo $idvehiculotipo; ?></b>  <?php echo $idvehiculomarca; ?></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $descripcion; ?></td>
                        <td><?php echo $fecha; ?></td>
                        <td>$ <?php echo number_format($valortotal); ?></td>

                        <td><a class="btn-actualizar" href="#actualizar<?php echo $idmantenimiento; ?>" data-toggle="modal">ACTUALIZAR</a></td>
                        <?php if($_SESSION['rol']==1){ ?>
                        <td><a href="select_adm_man.php?eliminar=<?php echo $idmantenimiento; ?>"><i class='far fa-trash-alt' style='font-size:24px;color:black;' onclick="return ComfirmDelete()" ></i></a></td>
                        <?php } ?>
                      </tr>


          <!-- Modal actualizar -->
          <div id="actualizar<?php echo $idmantenimiento; ?>"class="modal fade" data-target="#actualizar<?php echo $idmantenimiento; ?>" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center">Actualizar</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input type="hidden" name="txtid" value="<?php echo $idmantenimiento; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Vehiculo: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                          <?php
                            $buscar=mysqli_query($con,"SELECT m.IdVehiculo AS IdVehiculo, v.Marca AS Marca, v.Tipo AS Tipo FROM mantenimiento m, vehiculo v WHERE v.IdVehiculo=m.IdVehiculo AND m.IdVehiculo='$idvehiculovehiculo'");
                            $result_sql=mysqli_fetch_array($buscar);
                            $idvehiculo=$result_sql['IdVehiculo'];
                            $marca=$result_sql['Marca'];
                            $tipo=$result_sql['Tipo'];
                          ?>

                          <select name="selectVehiculo" class="notItemOne form-control">

                            <?php

                            echo "<option value=".$result_sql['IdVehiculo'].">".$result_sql['Tipo']." ".$result_sql['Marca']."</option>";

                              $sql=mysqli_query($con,"select * from vehiculo");
                              while ($res=mysqli_fetch_array($sql)) {
                                $tipo = $res['Tipo'];
                                $marca = $res['Marca'];
                                $idvehiculo = $res['IdVehiculo'];
                                echo "<option value='$idvehiculo'>$tipo <b>$marca</b></option>";
                              }
                            ?>

                          </select>

                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombre: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputLastName" class="sr-only">Nombre</label>
                          <input type="text" id="inputLastName" class="form-control" name="txtNombreM" value="<?php echo $nombre; ?>" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Descripcion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <textarea name="txtDescripcionM" cols="25" rows="8" class="form-control" value="<?php echo $descripcion; ?>" required><?php echo $descripcion ?></textarea>
                          <form action="cgi-bin/control.exe" method="post" enctype="text/plain" name="miform">
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Fecha: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputTelefono" class="sr-only">Fecha</label>
                          <input type="date" id="inputTelefono" class="form-control" name="txtFechaM" value="<?php echo $fecha; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Valor Total: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDireccion" class="sr-only">Valor Total</label>
                          <input type="number" id="inputDireccion" class="form-control" name="txtValorM" value="<?php echo $valortotal; ?>">
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

                <?php if ($in>=10) { ?>
                <div class="paginador">
                  <ul>
                    <?php 
                      if ($pagina_m_v!=1) {
                      
                    ?>
                    <li><a href="?pagina_m_v=<?php echo 1; ?>">|<</a></li>
                    <li><a href="?pagina_m_v=<?php echo $pagina_m_v-1; ?>"><<</a></li>
                    <?php 
                      }
                      for ($i=1; $i <= $total_pagina_m_v; $i++) {
                        if ($i==$pagina_m_v) {
                           echo '<li class="pageSelected">'.$i.'</li>';
                         } else {
                           echo '<li><a href="?pagina_m_v='.$i.'">'.$i.'</a></li>';
                         }
                      }
                      if ($pagina_m_v!=$total_pagina_m_v) {
                    ?>

                    <li><a href="?pagina_m_v=<?php echo $pagina_m_v+1; ?>">>></a></li>
                    <li><a href="?pagina_m_v=<?php echo $total_pagina_m_v; ?>">>|</a></li>
                    <?php 
                      }
                    ?>
                  </ul>
                </div>
                <?php } ?>

                <!--FIN PAGINADOR-->

                  </div>

                  <?php
                    if (isset($_POST['actualizar'])) {
                      
                      if (empty($_POST['selectVehiculo']) || empty($_POST['txtNombreM']) || empty($_POST['txtDescripcionM']) || empty($_POST['txtFechaM']) || empty($_POST['txtValorM'])) {
                        echo "<script>alert('Error')</script>";
                      } else {
                        $idp_actualizar=$_POST['txtid'];
                        $idvehiculo_actualizar=$_POST['selectVehiculo'];
                        $nombre_actualizar=$_POST['txtNombreM'];
                        $descripcion_actualizar=$_POST['txtDescripcionM'];
                        $fecha_actualizar=$_POST['txtFechaM'];
                        $valor_actualizar=$_POST['txtValorM'];

                         $actualizar="UPDATE mantenimiento SET IdVehiculo=$idvehiculo_actualizar, Nombre='$nombre_actualizar', Descripcion='$descripcion_actualizar', Fecha='$fecha_actualizar', ValorTotal='$valor_actualizar' WHERE IdMantenimiento=$idp_actualizar ";
                          $ejecutar=mysqli_query($con,$actualizar);
                          
                          if ($ejecutar) {
                            echo "<script>alert('Registro Actualizado')</script>";
                            echo "<script>window.open('select_adm_man.php','_self')</script>";
                          }else{
                            echo "<script>alert('Error')</script>";
                          }
                      }
                        
                    }
                  ?>

                  <?php
                    if (isset($_GET['eliminar'])) {
                      $borrar_id=$_GET['eliminar'];
                      $eliminar="DELETE FROM mantenimiento WHERE IdMantenimiento='$borrar_id'";
                      $ejecutar=mysqli_query($con,$eliminar);
                      if ($ejecutar) {
                        echo "<script>alert('el registro ha sido eliminado')</script>";
                        echo "<script>window.open('select_adm_man.php','_self')</script>";
                      }else{
                        echo "<script>alert('Error')</script>";
                      }
                    }
                  ?>

                </form>
              </div>

            </div>


            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              
              <div class="row py-2 listado1_man">

                <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  LISTADO DE MANTENIMIENTO DE MAQUINARIA
                </div>

                <div class="listado1 col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <!--LISTADO DE EGRESOS-->
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="mover d-flex justify-content-center">
                    <?php if($_SESSION['rol']==1){ ?>
                    <form class="mover d-flex justify-content-end" name="insert" method="post" action="select_adm_maq.php">
                      <button class="boton-insertar2-maquinaria" type="submit" name="MAQUINARIA" >
                        MAQUINARIA <i class="fas fa-cogs" ></i>
                      </button>
                    </form>
                    <?php } ?>
                    <button class="boton3-ini-nuevo" data-toggle="modal" data-target="#new_man_maq"> NUEVO <i class="fas fa-plus"></i> </button>

                  </div>
                </div>
              </div>

              <div>
                <form method="post" action="">
                  <div class="table-responsive">
                    <table>
                      <tr>
                        <td class="th1"><b>N°</b></td>
                        <td class="th1"><b>MAQUINARIA</b></td>
                        <td class="th1"><b>NOMBRE</b></td>
                        <td class="th1"><b>DESCRIPCION</b></td>
                        <td class="th1"><b>FECHA</b></td>
                        <td class="th1"><b>VALOR_TOTAL</b></td>
                        <td class="th1"><b>ACTUALIZAR</b></td>
                        <?php if($_SESSION['rol']==1){ ?>
                        <td class="th1"><b></b></td>
                        <?php } ?>
                      </tr>

                      <?php
                      $sql_registe_m_m=mysqli_query($con,"SELECT COUNT(*) AS cantidad FROM mantenimiento WHERE Recurso='Maquinaria'");
                      $result_register_m_m=mysqli_fetch_array($sql_registe_m_m);
                      $numero_m_m=$result_register_m_m['cantidad'];

                      $por_pagina=10;
                      if (empty($_GET['pagina_m_m'])) {
                        $pagina_m_m=1;
                      }else{
                        $pagina_m_m=$_GET['pagina_m_m'];
                      }

                      $desde_m_m=($pagina_m_m-1)*$por_pagina;
                      $total_pagina_m_m=ceil($numero_m_m / $por_pagina);


                        $consulta="SELECT * FROM mantenimiento,maquinaria WHERE maquinaria.IdMaquinaria=mantenimiento.IdMaquinaria AND Recurso='Maquinaria' ORDER BY mantenimiento.IdMantenimiento DESC LIMIT $desde_m_m,$por_pagina";
                        $ejecutar=mysqli_query($con,$consulta);
                        $i=0;
                        while ($fila=mysqli_fetch_array($ejecutar)) {
                          $idmantenimiento=$fila['IdMantenimiento'];
                          $idmaquinariamaquinaria=$fila['IdMaquinaria'];
                          $idmaquinarianombre=$fila['NombreMaq'];
                          $nombre=$fila['Nombre'];
                          $descripcion=$fila['Descripcion'];
                          $fecha=$fila['Fecha'];
                          $valortotal=$fila['ValorTotal'];
                          $i++;
                          $in=$i+$desde_m_m;
                      ?>

                      <tr>
                        <td><?php echo $in; ?></td>
                        <td><?php echo $idmaquinarianombre; ?></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $descripcion; ?></td>
                        <td><?php echo $fecha; ?></td>
                        <td>$ <?php echo number_format($valortotal); ?></td>

                        <td><a class="btn-actualizar" href="#actualizar<?php echo $idmantenimiento; ?>" data-toggle="modal">ACTUALIZAR</a></td>
                        <?php if($_SESSION['rol']==1){ ?>
                        <td><a href="select_adm_man.php?eliminar=<?php echo $idmantenimiento; ?>"><i class='far fa-trash-alt' style='font-size:24px;color:black;' onclick="return ComfirmDelete()" ></i></a></td>
                        <?php } ?>
                      </tr>



          <!-- Modal actualizar -->
          <div id="actualizar<?php echo $idmantenimiento; ?>"class="modal fade" data-target="#actualizar<?php echo $idmantenimiento; ?>" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center">Actualizar</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input type="hidden" name="txtid" value="<?php echo $idmantenimiento; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Maquinaria: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                          <?php
                            $buscar=mysqli_query($con,"SELECT m.IdMaquinaria AS IdMaquinaria, mq.NombreMaq AS Nombre FROM mantenimiento m, maquinaria mq WHERE mq.IdMaquinaria=m.IdMaquinaria AND m.IdMaquinaria='$idmaquinariamaquinaria'");
                            $result_sql=mysqli_fetch_array($buscar);
                            $idmaquinaria=$result_sql['IdMaquinaria'];
                            $nombre1=$result_sql['Nombre'];
                          ?>

                          <select name="selectMaquinaria" class="form-control">

                            <?php

                            echo "<option value=".$result_sql['IdMaquinaria'].">".$result_sql['Nombre']."</option>";

                              $sql=mysqli_query($con,"select * from maquinaria");
                              while ($res=mysqli_fetch_array($sql)) {
                                $nombremaq = $res['NombreMaq'];
                                $idMaquinaria = $res['IdMaquinaria'];
                                echo "<option value='$idMaquinaria'>$nombremaq</option>";
                              }
                            ?>

                          </select>

                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombre: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputLastName" class="sr-only">Nombre</label>
                          <input type="text" id="inputLastName" class="form-control" name="txtNombreMan" value="<?php echo $nombre; ?>" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Descripcion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <textarea name="txtDescripcionMan" cols="25" rows="8" class="form-control" value="<?php echo $descripcion; ?>" required><?php echo $descripcion ?></textarea>
                          <form action="cgi-bin/control.exe" method="post" enctype="text/plain" name="miform">
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Fecha: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputTelefono" class="sr-only">Fecha</label>
                          <input type="date" id="inputTelefono" class="form-control" name="txtFechaMan" value="<?php echo $fecha; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Valor Total: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDireccion" class="sr-only">Valor Total</label>
                          <input type="number" id="inputDireccion" class="form-control" name="txtValorMan" value="<?php echo $valortotal; ?>">
                        </div>

                      </div>

                      <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input class="boton-insertar" type="submit" name="actualizar2" value="Actualizar">
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

                <?php if ($in>=10) { ?>
                <div class="paginador">
                  <ul>
                    <?php 
                      if ($pagina_m_m!=1) {
                      
                    ?>
                    <li><a href="?pagina_m_m=<?php echo 1; ?>">|<</a></li>
                    <li><a href="?pagina_m_m=<?php echo $pagina_m_m-1; ?>"><<</a></li>
                    <?php 
                      }
                      for ($i=1; $i <= $total_pagina_m_m; $i++) {
                        if ($i==$pagina_m_m) {
                           echo '<li class="pageSelected">'.$i.'</li>';
                         } else {
                           echo '<li><a href="?pagina_m_m='.$i.'">'.$i.'</a></li>';
                         }
                      }
                      if ($pagina_m_m!=$total_pagina_m_m) {
                    ?>

                    <li><a href="?pagina_m_m=<?php echo $pagina_m_m+1; ?>">>></a></li>
                    <li><a href="?pagina_m_m=<?php echo $total_pagina_m_m; ?>">>|</a></li>
                    <?php 
                      }
                    ?>
                  </ul>
                </div>
                <?php } ?>

                <!--FIN PAGINADOR-->

                  </div>

                  <?php
                    if (isset($_POST['actualizar2'])) {
                      
                      if (empty($_POST['selectMaquinaria']) || empty($_POST['txtNombreMan']) || empty($_POST['txtDescripcionMan']) || empty($_POST['txtFechaMan']) || empty($_POST['txtValorMan'])) {
                        echo "<script>alert('Error')</script>";
                      } else {
                        
                        $idp_actualizar2=$_POST['txtid'];
                        $idmaquinaria_actualizar2=$_POST['selectMaquinaria'];
                        $nombre_actualizar2=$_POST['txtNombreMan'];
                        $descripcion_actualizar2=$_POST['txtDescripcionMan'];
                        $fecha_actualizar2=$_POST['txtFechaMan'];
                        $valor_actualizar2=$_POST['txtValorMan'];

                        $actualizar_actualizar2="UPDATE mantenimiento SET IdMaquinaria=$idmaquinaria_actualizar2, Nombre='$nombre_actualizar2', Descripcion='$descripcion_actualizar2', Fecha='$fecha_actualizar2', ValorTotal='$valor_actualizar2' WHERE IdMantenimiento=$idp_actualizar2 ";
                        $ejecutar_actualizar2=mysqli_query($con,$actualizar_actualizar2);
                        
                        if ($ejecutar_actualizar2) {
                          echo "<script>alert('Registro Actualizado')</script>";
                          echo "<script>window.open('select_adm_man.php','_self')</script>";
                        }else{
                          echo "<script>alert('Error')</script>";
                        }
                      }
                      
                    }
                  ?>

                  <?php
                    if (isset($_GET['eliminar'])) {
                      $borrar_id=$_GET['eliminar'];
                      $eliminar="DELETE FROM mantenimiento WHERE IdMantenimiento='$borrar_id'";
                      $ejecutar=mysqli_query($con,$eliminar);
                      if ($ejecutar) {
                        echo "<script>alert('el registro ha sido eliminado')</script>";
                        echo "<script>window.open('select_adm_man.php','_self')</script>";
                      }else{
                        echo "<script>alert('Error')</script>";
                      }
                    }
                  ?>

                </form>
              </div>

            </div>
            
          </div>

          <!--FIN DE EJEMPLO 1-->

          <!--INICIO EJEMPLO 2-->

          <!--FIN EJEMPLO 2-->


        </main>
      </div>
    </div>

      <!--FIN DE LA VISTA-->

      <!--INICIO MODALES-->

        <!--INICIO MODAL INSERTAR MANTENIMIENTO VEHICULO-->

        <div id="new_man_veh" class="modal fade" role="dialog">

          <div class="modal-dialog modal-md">

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center titulo_modal">INSERTAR MANTENIMIENTO</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                  <form name="form" method="post" action="">
                    <div class="caja-actualizar">
                      
                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Vehiculo: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <select name="selectVehiculo" class="form-control">
                            <option value="0">Seleccione un Vehiculo</option>

                            <?php
                              $sql=mysqli_query($con,"select * from vehiculo");
                              while ($res=mysqli_fetch_array($sql)) {
                                echo "<option value=".$res['IdVehiculo'].">".$res['Tipo']."  ".$res['Marca']."</option>";
                              }
                            ?>

                          </select>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombre: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombre</label>
                          <input type="text" id="inputName" class="form-control" placeholder="Nombre del Mantenimiento" name="txtNombre" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Descripcion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <textarea name="txtDescripcion" cols="25" rows="7"  required></textarea>
                          <form action="cgi-bin/control.exe" method="post" enctype="text/plain" name="miform">
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Fecha: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <input type="date" class="form-control" name="txtFecha" required>
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

          <!--FIN MODAL INSERTAR MANTENIMIENTO VEHICULO-->

          <!--INICIO MODAL INSERTAR MANTENIMIENTO MAQUINARIA-->

        <div id="new_man_maq" class="modal fade" role="dialog">

          <div class="modal-dialog modal-md">

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center titulo_modal">INSERTAR MANTENIMIENTO</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                  <form name="form" method="post" action="">
                    <div class="caja-actualizar">
                      
                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Maquinaria: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <select name="selectMaquinaria" class="form-control">
                            <option value="0">Seleccione una maquinaria</option>

                            <?php
                              $sql=mysqli_query($con,"select * from maquinaria ");
                              while ($res=mysqli_fetch_array($sql)) {
                                echo "<option value=".$res['IdMaquinaria'].">".$res['NombreMaq']."</option>";
                              }
                            ?>

                          </select>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombre del pago: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombre del pago</label>
                          <input type="text" id="inputName" class="form-control" placeholder="Nombre del pago" name="txtNombre" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Descripcion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <textarea name="txtDescripcion" cols="25" rows="8" class="form-control" required></textarea>
                          <form action="cgi-bin/control.exe" method="post" enctype="text/plain" name="miform">
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
                          <p class="caja-actualizar-cli">Valor total: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputValor" class="sr-only">Valor total</label>
                          <input type="number" id="inputValor" class="form-control" placeholder="Valor total" name="txtValor" required>
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

          <!--FIN MODAL INSERTAR MANTENIMIENTO MAQUINARIA-->

          

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