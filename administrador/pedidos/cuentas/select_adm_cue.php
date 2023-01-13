<?php
  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../../../index.php');
  }
  include("../../../conexiones/conexion.php");

  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/m.css"> 
    <link rel="stylesheet" href="../../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../../dashboard.css">
    <link rel="stylesheet" href="../../../product.css">
    <link rel="stylesheet" href="../../../css/select2.css"> 

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
            <a href=""><img src="../../../img/LOGO.jpg" alt="" height="180" width="180" class="img-fluid my-auto"></a>
            
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
        <a class="py-2 d-none d-md-inline-block" href="../../reportes/ingresos_egresos.php">
          <span data-feather="bar-chart-2"></span>   INGRESOS Y EGRESOS MENSUALES</a>
        <a class="py-2 d-none d-md-inline-block" href="../../reportes/inventario.php">
          <span data-feather="clipboard"></span>   INVENTARIO</a>
        <a class="py-2 d-none d-md-inline-block" href="../../reportes/deudores.php">
          <span data-feather="list"></span>   DEUDORES</a>
        <a class="py-2 d-none d-md-inline-block" href="../../reportes/ventas.php">
          <span data-feather="trending-up"></span>   VENTAS</a>

          <a class="py-2 d-none d-md-inline-block borde_boton_salir" href="#" style="font-size: 16px;" id="dropdown01" data-toggle="dropdown">SALIR<i class="fa fa-power-off" aria-hidden="true" style="font-size: 23px; padding-top: 3px;"></i>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="../../configuracion/configuracion.php">Configuracion</a>
            <a class="dropdown-item" href="../../../salir.php">Cerrar Sesion</a>
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
                <a class="nav-link" href="../../index.php">
                  <span data-feather="home"></span>
                  INICIO <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../ventas/select_adm_ven.php">
                  <span data-feather="shopping-cart"></span>
                  VENTAS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../clientes/select_adm_cli.php">
                  <span data-feather="users"></span>
                  CLIENTES
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../../pedidos/select_adm_ped.php">
                  <span data-feather="truck"></span>
                  COMPRAS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../proveedores/select_adm_pro.php">
                  <span data-feather="phone-incoming"></span>
                  PROVEEDORES
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../egresos/select_adm_egr.php">
                  <span data-feather="trending-down"></span>
                  GASTOS FIJOS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../productos/select_adm_pro.php">
                  <span data-feather="shopping-bag"></span>
                  PRODUCTO<!--bar-chart-2-->
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../fabricacion/select_adm_fab.php">
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
                <a class="nav-link" href="../../contratacion/select_adm_con.php">
                  <span data-feather="file-text"></span>
                  NOMINA
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../trabajador/select_adm_tra.php">
                  <span data-feather="user-check"></span>
                  TRABAJADOR
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../mantenimiento/select_adm_man.php">
                  <span data-feather="dollar-sign"></span>
                  MANTENIMIENTO
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">CUENTAS POR PAGAR</h1>
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
              LISTADO DE CUENTAS POR PAGAR
            </div>
            <div class="listado1 col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <!--LISTADO DE EGRESOS-->
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="mover d-flex justify-content-center">

                <form class="mover d-flex justify-content-end" name="insert" method="post" action="historial.php">
                  <button class="boton-insertar2-tipo-egreso" type="submit" name="HISTORIAL" >
                    HISTOR <i class="fa fa-bars" aria-hidden="true"></i>
                  </button>
                </form>

                <button class="boton3-ini-nuevo" data-toggle="modal" data-target="#new_tipo_pro"> NUEVO <i class="fas fa-plus"></i> </button>
              </div>
            </div>
          </div>

          <div>
              <div class="table-responsive">
                <table>
                  <tr>
                    <td class="th1"><b>N°</b></td>
                    <td class="th1"><b>PROVEEDOR</b></td>
                    <td class="th1"><b>NIT</b></td>
                    <td class="th1"><b>DESCRIPCION</b></td>
                    <td class="th1"><b>SALDO_PENDIENTE</b></td>
                    <td class="th1"><b>HISTORIAL</b></td>
                    <td class="th1"><b>ACTUALIZAR</b></td>
                    <td class="th1"><b></b></td>
                  </tr>

                  <?php
                    $consulta="SELECT cuentapendiente.IdCuentaPendiente AS id, proveedor.IdProveedor AS idprovee, proveedor.Nombre AS nombre_p, proveedor.Nit AS nit, cuentapendiente.Descripcion as descripcion, cuentapendiente.SaldoPendiente AS saldo FROM proveedor, cuentapendiente WHERE proveedor.IdProveedor=cuentapendiente.IdProveedor AND cuentapendiente.SaldoPendiente<>0 AND cuentapendiente.Estatus=1 AND cuentapendiente.Estado='Se debe' ORDER BY cuentapendiente.IdCuentaPendiente DESC";
                    $ejecutar=mysqli_query($con,$consulta);
                    $i=0;
                    while ($fila=mysqli_fetch_array($ejecutar)) {
                      $idcuenta_pen=$fila['id'];
                      $idproveedor=$fila['idprovee'];
                      $nombrepro=$fila['nombre_p'];
                      $nit=$fila['nit'];
                      $descripcion=$fila['descripcion'];
                      $saldo=$fila['saldo'];
                      $i++;
                  ?>

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $nombrepro; ?></td>
                    <td><?php echo $nit; ?></td>
                    <td><?php echo $descripcion; ?></td>
                    <td>$ <?php echo number_format($saldo); ?></td>

                    <td>
                      <form action="historial.php" method="post">
                        <input type="hidden" name="idcliente" value="<?php echo $idproveedor; ?>">
                        <input type="submit" name="historial" class="btn-actualizar" value="VER HISTORIAL">
                      </form>
                    </td>

                    <td><a class="btn-actualizar_1" href="#actualizar<?php echo $idcuenta_pen; ?>" data-toggle="modal">ABONAR</a></td>

                    <td><a href="select_adm_cue.php?eliminar=<?php echo $idcuenta_pen; ?>"><i class='fas fa-trash-alt' style='font-size:24px;color:black;' onclick="return ComfirmDelete()" ></i></a></td>
                  </tr>



          <!-- Modal actualizar -->
          <div id="actualizar<?php echo $idcuenta_pen; ?>"class="modal fade" data-target="#actualizar<?php echo $idcuenta_pen; ?>" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center">Actualizar datos</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input type="hidden" name="txtid" value="<?php echo $idcuenta_pen; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Fecha: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Fecha</label>
                          <input type="date" id="inputName" class="form-control" name="txtFecha" required autofocus>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Abonar: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Abonar</label>
                          <input type="number" id="inputName" class="form-control" name="txtSaldo" placeholder="$--------------" required autofocus>
                        </div>

                      </div>

                    <div class="modal-footer">

                      <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input class="boton-insertar" type="submit" name="actualizar" value="Actualizar">
                          <button type="button" class="boton-insertar2" data-dismiss="modal">Cancelar</button>
                        </div>

                      </div>

                    </div>

                </form>

                
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
              </div>

              <?php
                if (isset($_POST['actualizar'])) {
                  
                  if (empty($_POST['txtFecha']) || empty($_POST['txtSaldo'])) {
                    echo "<script>alert('Error')</script>";
                  } else {

                    $idp=$_POST['txtid'];
                    $fecha_p=$_POST['txtFecha'];
                    $saldo=$_POST['txtSaldo'];

                    $query=mysqli_query($con,"SELECT * FROM cuentapendiente WHERE Idcuentapendiente='$idp'");
                    $result=mysqli_fetch_array($query);
                    $saldo_pagar=$result['SaldoPagar'];
                    $saldo_p=$result['SaldoPendiente'];
                    $valor_f=$result['ValorFacura'];
                    $id_cliente=$result['IdProveedor'];
                    $id_pedido=$result['IdPedido'];
                    $descripcion=$result['Descripcion'];

                    if ($saldo>$saldo_p) {
                      echo "<script>alert('la cantidad supera al saldo actual')</script>";
                    } else if($saldo<=$saldo_p){

                      $saldo_pend_total=$saldo_p-$saldo;

                      if ($saldo_pend_total==0) {
                        $estado='No se debe';
                      } else if($saldo_pend_total>=0) {
                        $estado='Se debe';
                      }
                      
                      if($id_cliente!='' && $id_pedido!=''){
                        $actualizar_1="INSERT INTO cuentapendiente(IdPedido, IdProveedor, SaldoPagar, ValorFacura, Fecha,Descripcion, Estatus, SaldoPendiente, Estado) VALUES('$id_pedido','$id_cliente','$saldo','$valor_f','$fecha_p','$descripcion','1','$saldo_pend_total','$estado')";
                        $ejecutar_1=mysqli_query($con,$actualizar_1);

                        $actualizar="UPDATE cuentapendiente SET Estado='En Proceso' WHERE IdCuentaPendiente=$idp ";
                        $ejecutar=mysqli_query($con,$actualizar);

                        if ($ejecutar_1 && $ejecutar) {
                          echo "<script>alert('Registro Actualizado')</script>";
                          echo "<script>window.open('select_adm_cue.php','_self')</script>";
                        }else{
                          echo "<script>alert('Error')</script>";
                        }
                      }else if($id_cliente=='' && $id_pedido!=''){
                        $actualizar_1="INSERT INTO cuentapendiente(IdPedido, SaldoPagar, ValorFacura, Fecha,Descripcion, Estatus, SaldoPendiente, Estado) VALUES('$id_pedido','$saldo','$valor_f','$fecha_p','$descripcion','1','$saldo_pend_total','$estado')";
                        $ejecutar_1=mysqli_query($con,$actualizar_1);

                        $actualizar="UPDATE cuentapendiente SET Estado='En Proceso' WHERE IdCuentaPendiente=$idp ";
                        $ejecutar=mysqli_query($con,$actualizar);

                        if ($ejecutar_1 && $ejecutar) {
                          echo "<script>alert('Registro Actualizado')</script>";
                          echo "<script>window.open('select_adm_cue.php','_self')</script>";
                        }else{
                          echo "<script>alert('Error')</script>";
                        }
                      }else if($id_cliente!='' && $id_pedido==''){
                        $actualizar_1="INSERT INTO cuentapendiente(IdProveedor, SaldoPagar, ValorFacura, Fecha,Descripcion, Estatus, SaldoPendiente, Estado) VALUES('$id_cliente','$saldo','$valor_f','$fecha_p','$descripcion','1','$saldo_pend_total','$estado')";
                        $ejecutar_1=mysqli_query($con,$actualizar_1);

                        $actualizar="UPDATE cuentapendiente SET Estado='En Proceso' WHERE IdCuentaPendiente=$idp ";
                        $ejecutar=mysqli_query($con,$actualizar);

                        if ($ejecutar_1 && $ejecutar) {
                          echo "<script>alert('Registro Actualizado')</script>";
                          echo "<script>window.open('select_adm_cue.php','_self')</script>";
                        }else{
                          echo "<script>alert('Error')</script>";
                        }
                      }else if($id_cliente=='' && $id_pedido==''){
                        $actualizar_1="INSERT INTO cuentapendiente(SaldoPagar, ValorFacura, Fecha,Descripcion, Estatus, SaldoPendiente, Estado) VALUES('$saldo','$valor_f','$fecha_p','$descripcion','1','$saldo_pend_total','$estado')";
                        $ejecutar_1=mysqli_query($con,$actualizar_1);

                        $actualizar="UPDATE cuentapendiente SET Estado='En Proceso' WHERE IdCuentaPendiente=$idp ";
                        $ejecutar=mysqli_query($con,$actualizar);

                        if ($ejecutar_1 && $ejecutar) {
                          echo "<script>alert('Registro Actualizado')</script>";
                          echo "<script>window.open('select_adm_cue.php','_self')</script>";
                        }else{
                          echo "<script>alert('Error')</script>";
                        }
                      }
                    }
                  }
                }
              ?>

              <?php
                if (isset($_GET['eliminar'])) {
                  $borrar_id=$_GET['eliminar'];
                  $eliminar="UPDATE cuentapendiente SET Estatus=2, Estado='Cancelado' WHERE IdCuentaPendiente='$borrar_id'";
                  $ejecutar=mysqli_query($con,$eliminar);
                  if ($ejecutar) {
                    echo "<script>alert('el registro ha sido eliminado')</script>";
                    echo "<script>window.open('select_adm_cue.php','_self')</script>";
                  }else{
                    echo "<script>alert('Error')</script>";
                  }
                }
              ?>

          </div>

        </main>
      </div>
    </div>

      <!--FIN DE LA VISTA-->

      <!--INICIO MODALES-->

        <!--INICIO MODAL INSERTAR-->

        <div id="new_tipo_pro" class="modal fade" role="dialog">

          <div class="modal-dialog modal-md">

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center titulo_modal">DESEA CREAR UNA DEUDA A UN CLIENTE?</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                  <form name="form_new_compra_p" id="form_new_deuda" method="post">
                    <div class="caja-actualizar">
                      
                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Proveedor: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                          <select id="select_pro" style="width: 200px;" name="selectpro">
                            <option value="0">Seleccione un proveedor</option>
                            
                            <?php
                              $sql=mysqli_query($con,"select * from proveedor ");
                              while ($res=mysqli_fetch_array($sql)) {
                                echo '<option  value='.$res['IdProveedor'].'>'.$res['Nombre'].'</option>';
                              }
                            ?>

                          </select>

                          <input type="hidden" name="action" value="addClientePro">

                          <input type="hidden" id="idCliente_pro" name="idCliente_pro" value="" required>

                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Fecha: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <input type="date" id="fec_cliente" class="form-control" name="fec_cliente" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Descripcion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <textarea class="form-control" name="txt_descripcion" id="txt_descripcion" cols="15" rows="4" required></textarea>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Saldo a pagar: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <input type="number" id="abo_cliente" class="form-control" placeholder="--Dinero a pagar--" name="abo_cliente" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Valor factura: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <input type="number" id="sal_cliente" class="form-control" placeholder="--Valor factura--" name="sal_cliente" required>
                        </div>

                      </div>

                      <div class="modal-footer">
                      
                        <div class="row">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input class="boton-insertar" type="submit" name="nuevo" value="Insertar">
                            <button type="submit" class="boton-insertar2" data-dismiss="modal" id="guardar">Cancelar</button>
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
    

    <!-- Icons -->
    <script src="../../../feather.min.js"></script>
    <script>
      feather.replace()
    </script>



	  <script src="../../../js/fontawesome-all.js"></script>
    <script src="../../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/functions.js"></script>
    <script src="../../../js/select2.js"></script>
    <script type="text/javascript">
      $(document).ready(function() { 
        $("#select_pro").select2(); 
      });
    </script>
</body>
</html>

<?php }else{
  header('location: ../../../salir.php');
} ?>