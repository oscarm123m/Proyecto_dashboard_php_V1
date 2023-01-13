<?php
  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
  }
  include("../../conexiones/conexion.php");

  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
    ?>
    <?php

  if (isset($_POST['nuevo'])) {
    
    if (empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtDocumento']) || empty($_POST['selectCargo']) || empty($_POST['txtTelefono']) || empty($_POST['txtDireccion'])) {
      //$alert='<p class="msg_error">Algunos campos son abligatorios</p>';
    } else {

      include("../../conexiones/conexion.php");

      $nombre=$_POST['txtNombre'];
      $apellido=$_POST['txtApellido'];
      $documento=$_POST['txtDocumento'];
      $cargo=$_POST['selectCargo'];
      $telefono=$_POST['txtTelefono'];
      $direccion=$_POST['txtDireccion'];
      $clave=(empty($_POST['txtcontrasena']))? '': md5($_POST['txtcontrasena']);
      $claverepetir=(empty($_POST['txtcontrasenarepetir']))? '': md5($_POST['txtcontrasenarepetir']);

      
      if (!empty($_POST['txtUsuario'])) {
        $usuario1 = $_POST['txtUsuario'];
        $query=mysqli_query($con,"SELECT * FROM persona WHERE usuario='$usuario1' ");
        $result=mysqli_fetch_array($query);
      } else {
        $result = null;
        $usuario1=null;
      }
      if ($result) {
        echo "<script>alert('El correo ya existe')</script>";
      } else {


        if ($clave== '' AND $claverepetir=='') {
          $contrasena=$clave;

          $query_insert=mysqli_query($con,"INSERT INTO persona(IdCargo,NombreP,Apellido,Documento,Telefono,Direccion,Usuario,Contrasena,Estado) VALUES('$cargo','$nombre','$apellido','$documento','$telefono','$direccion','$usuario1','$contrasena','Activo')");
          if ($query_insert) {
            echo "<script>alert('Registro Insertado')</script>";
            echo "<script>window.open('select_adm_tra.php','_self')</script>";
          }else{
            echo "<script>alert('Error')</script>";
          }


        }else if($clave!=$claverepetir){
          echo "<script>alert('Las contraseñas no coinciden')</script>";
        }else if($clave==$claverepetir){
          $contrasena=$clave;

          $query_insert=mysqli_query($con,"INSERT INTO persona(IdCargo,NombreP,Apellido,Documento,Telefono,Direccion,Usuario,Contrasena,Estado) VALUES('$cargo','$nombre','$apellido','$documento','$telefono','$direccion','$usuario1','$contrasena','Activo')");
          if ($query_insert) {
            echo "<script>alert('Registro Insertado')</script>";
            echo "<script>window.open('select_adm_tra.php','_self')</script>";
          }else{
            echo "<script>alert('Error')</script>";
          }
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
                <a class="nav-link  active" href="../trabajador/select_adm_tra.php">
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
            <h1 class="h2">TRABAJADORES</h1>
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
              LISTADO DE TRABAJADORES
            </div>

            <div class="listado1 col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <!--LISTADO DE EGRESOS-->
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <div class="mover d-flex justify-content-center">
                <?php if($_SESSION['rol']==1){ ?>
                <form class="mover d-flex justify-content-end" name="insert" method="post" action="rol/select_adm_rol.php">
                  <button class="boton-insertar2-tipo-egreso" type="submit" name="CARGO" >
                    CARGOS <i class="fas fa-users" ></i>
                  </button>
                </form>
                
                <button class="boton3-ini-nuevo" data-toggle="modal" data-target="#new_trabajadores"> NUEVO <i class="fas fa-plus"></i> </button>
                <?php } ?>
              </div>
            </div>
          </div>

          <div>
            <form method="post" action="select_adm_tra.php">
              <div class="table-responsive">
                <table>
                  <tr>
                    <td class="th1"><b>N°</b></td>
                    <td class="th1"><b>NOMBRE</b></td>
                    <td class="th1"><b>APELLIDO</b></td>
                    <td class="th1"><b>DOCUMENTO</b></td>
                    <td class="th1"><b>CARGO</b></td>
                    <td class="th1"><b>TELEFONO</b></td>
                    <td class="th1"><b>DIRECCION</b></td>
                    <td class="th1"><b>USUARIO</b></td>
                    <td class="th1"><b>ESTADO</b></td>
                    <td class="th1"><b>ACTUALIZAR</b></td>
                    <td class="th1"><b></b></td>
                  </tr>

                  <?php
                  $sql_registe=mysqli_query($con,"SELECT COUNT(*) AS cantidad FROM persona WHERE IdCargo <> 3");
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


                    $consulta="SELECT * FROM persona,cargo WHERE persona.IdCargo=cargo.IdCargo AND cargo.IdCargo <> 3 ORDER by persona.IdCargo ASC LIMIT $desde,$por_pagina";
                    $ejecutar=mysqli_query($con,$consulta);
                    $i=0;
                    while ($fila=mysqli_fetch_array($ejecutar)) {
                      $idpersona=$fila['IdPersona'];
                      $nombre=$fila['NombreP'];
                      $apellido=$fila['Apellido'];
                      $documento=$fila['Documento'];
                      $idcargo=$fila['NombreC'];
                      $telefono=$fila['Telefono'];
                      $direccion=$fila['Direccion'];
                      $usuario=$fila['Usuario'];
                      $estado=$fila['Estado'];
                      $cargo1=$fila['IdCargo'];
                      $i++;
                      $in=$i+$desde;
                  ?>

                  <tr>
                    <td><?php echo $in; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $apellido; ?></td>
                    <td><?php echo $documento; ?></td>
                    <td><?php echo $idcargo; ?></td>
                    <td><?php echo $telefono; ?></td>
                    <td><?php echo $direccion; ?></td>
                    <td><?php echo $usuario; ?></td>

                    <?php if($estado=='Activo'){ ?>
                    <td><p class="estado1"><?php echo $estado; ?></p></td>
                    <?php }else if($estado=='Inactivo'){ ?>
                    <td><p class="estado2"><?php echo $estado; ?></p></td>
                    <?php } ?>

                    <?php if ($cargo1 !=1 AND $idpersona!=$_SESSION['idUser']) { ?>

                    <td><a class="btn-actualizar" href="#actualizar<?php echo $idpersona; ?>" data-toggle="modal">ACTUALIZAR</a></td>

                    <?php } ?>

                    <?php if ($cargo1 !=1 AND $idpersona!=$_SESSION['idUser']) { ?>
                      <?php if($_SESSION['rol']==1){ ?>
                    <td><a href="select_adm_tra.php?eliminar=<?php echo $idpersona; ?>"><i class='far fa-trash-alt' style='font-size:24px;color:black;' onclick="return ComfirmDelete()" ></i></a></td>
                    <?php } ?>
                    <?php } ?>

                  </tr>



          <!-- Modal actualizar -->
          <div id="actualizar<?php echo $idpersona; ?>"class="modal fade" data-target="#actualizar<?php echo $idpersona; ?>" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center">Actualizar al trabajador <b><?php echo $nombre; ?></b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                  <div class="container-fluid">

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <input type="hidden" name="txtid" value="<?php echo $idpersona; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombres: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombre del Trabajador</label>
                          <input type="text" id="inputName" class="form-control" name="txtNombreT" value="<?php echo $nombre; ?>" required autofocus>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Apellidos: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputLastName" class="sr-only">Apellido del trabajador</label>
                          <input type="text" id="inputLastName" class="form-control" name="txtApellidoT" value="<?php echo $apellido; ?>" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Documento: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDocumento" class="sr-only">Documento</label>
                          <input type="number" id="inputDocumento" class="form-control" name="txtDocumentoT" value="<?php echo $documento; ?>" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Cargo: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <?php
                            $buscar=mysqli_query($con,"SELECT P.IdPersona AS IdPersona, C.IdCargo AS cargo, C.NombreC AS nombre FROM cargo c, persona p WHERE c.IdCargo=p.IdCargo AND C.IdCargo<>3 AND P.IdCargo='$cargo1'");
                            $result_sql=mysqli_fetch_array($buscar);
                            $idpersona=$result_sql['IdPersona'];
                            $cargo=$result_sql['cargo'];
                            $nombre=$result_sql['nombre'];
                          ?>
                          <select name="selectPersona" class="notItemOne form-control">

                            <?php

                            echo "<option value=".$result_sql['cargo'].">".$result_sql['nombre']."</option>";

                              $sql=mysqli_query($con,"SELECT * FROM cargo WHERE IdCargo <> 3");
                              while ($res=mysqli_fetch_array($sql)) {
                                $nombre_c = $res['NombreC'];
                                $id_cargo = $res['IdCargo'];
                                echo "<option value='$id_cargo'>$nombre_c</option>";
                              }
                            ?>

                          </select>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Telefono: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputTelefono" class="sr-only">Telefono</label>
                          <input type="number" id="inputTelefono" class="form-control" name="txtTelefonoT" value="<?php echo $telefono; ?>">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Direccion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDireccion" class="sr-only">Direccion</label>
                          <input type="text" id="inputDireccion" class="form-control" name="txtDireccionT" value="<?php echo $direccion; ?>">
                        </div>

                      </div>

                      <?php if($cargo1 !=4 and $cargo1 !=2){ ?>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Usuario: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputEmail" class="sr-only">Correo Electronico</label>
                          <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" name="txtUsuarioT" value="<?php echo $usuario; ?>">
                        </div>

                      </div>

                      <?php }else{?>

                        <input type="hidden" name="txtUsuarioT" value="<?php echo $usuario; ?>">

                      <?php } ?>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Estado: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <?php
                            $buscar2=mysqli_query($con,"SELECT Estado FROM persona WHERE IdPersona='$idpersona' ");
                            $result_sql2=mysqli_fetch_array($buscar2);
                            $estado1=$result_sql2['Estado'];
                          ?>
                          <select name="txtEstadoT" class="notItemOne form-control">

                            <?php

                            echo "<option value=".$result_sql2['Estado'].">".$result_sql2['Estado']."</option>";

                              $sql3=mysqli_query($con,"SELECT Estado FROM persona GROUP BY Estado");
                              while ($res3=mysqli_fetch_array($sql3)) {
                                if($res3['Estado'] == $fila['Estado']):
                                  echo "<option value=".$res3['Estado']." selected='selected'>".$res3['Estado']."</option>";
                                else:
                                  echo "<option value=".$res3['Estado'].">".$res3['Estado']."</option>";
                                endif;
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

                <?php if ($in>=10) { ?>
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
                <?php } ?>

                <!--FIN PAGINADOR-->

              </div>

              <?php
                if (isset($_POST['actualizar'])) {
                  
                  if (empty($_POST['selectPersona']) || empty($_POST['txtNombreT']) || empty($_POST['txtApellidoT']) || empty($_POST['txtDocumentoT']) || empty($_POST['txtTelefonoT']) || empty($_POST['txtDireccionT']) || empty($_POST['txtEstadoT'])) {
                    # code...
                  } else {

                    $idp_a=$_POST['txtid'];
                    $idcargo_a=$_POST['selectPersona'];
                    $nombre_a=$_POST['txtNombreT'];
                    $apellido_a=$_POST['txtApellidoT'];
                    $documento_a=$_POST['txtDocumentoT'];
                    $telefono_a=$_POST['txtTelefonoT'];
                    $direccion_a=$_POST['txtDireccionT'];
                    $estado_a=$_POST['txtEstadoT'];

                    if (!empty($_POST['txtUsuarioT'])) {
                      $usuario_a=$_POST['txtUsuarioT'];
                      $query_a=mysqli_query($con,"SELECT * FROM persona WHERE Usuario='$usuario_a' AND IdPersona !=$idp_a");
                      $result=mysqli_fetch_array($query_a);
                    } else {
                      $result = null;
                      $usuario_a=null;
                    }

                    if ($result>0) {
                      echo "<script>alert('El Correo ya existe')</script>";
                    } else {
                      $actualizar="UPDATE persona SET IdCargo=$idcargo_a, NombreP='$nombre_a', Apellido='$apellido_a', Documento='$documento_a', Telefono='$telefono_a', Direccion='$direccion_a', Usuario='$usuario_a', Estado='$estado_a' WHERE IdPersona=$idp_a ";
                      $ejecutar=mysqli_query($con,$actualizar);

                      if ($ejecutar) {
                        echo "<script>alert('Registro Actualizado')</script>";
                        echo "<script>window.open('select_adm_tra.php','_self')</script>";
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
                  $eliminar="DELETE FROM persona WHERE IdPersona='$borrar_id'";
                  $ejecutar=mysqli_query($con,$eliminar);
                  if ($ejecutar) {
                    echo "<script>alert('el trabajador ha sido eliminado')</script>";
                    echo "<script>window.open('select_adm_tra.php','_self')</script>";
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

        <div id="new_trabajadores" class="modal fade" role="dialog">

          <div class="modal-dialog modal-md">

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h3 class="modal-title text-center titulo_modal">INSERTAR TRABAJADOR</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                  <form name="form" method="post" action="">
                    <div class="caja-actualizar">
                      
                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Nombres: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputName" class="sr-only">Nombres</label>
                          <input type="text" id="inputName" class="form-control" name="txtNombre" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Apellidos: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputLastName" class="sr-only">Apellidos</label>
                          <input type="text" id="inputLastName" class="form-control" name="txtApellido" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Documento: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDocumento" class="sr-only">Documento</label>
                          <input type="number" id="inputDocumento" class="form-control" name="txtDocumento" required>
                        </div>

                      </div>


                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Cargo: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <select name="selectCargo" class="form-control">
                            <option value="0">Seleccione un cargo</option>

                            <?php
                              $sql=mysqli_query($con,"SELECT * FROM cargo WHERE IdCargo <> 3");
                              while ($res=mysqli_fetch_array($sql)) {
                                echo "<option value=".$res['IdCargo'].">".$res['NombreC']."</option>";
                              }
                            ?>

                          </select>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Telefono: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputTelefono" class="sr-only">Telefono</label>
                          <input type="number" id="inputTelefono" class="form-control" name="txtTelefono" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Direccion: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputDireccion" class="sr-only">Direccion</label>
                          <input type="text" id="inputDireccion" class="form-control" name="txtDireccion" required>
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Usuario: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputEmail" class="sr-only">Correo Electronico</label>
                          <input type="email" id="inputEmail" class="form-control" name="txtUsuario">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Contraseña: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputPassword" class="sr-only">Contraseña</label>
                          <input type="password" id="inputPassword" class="form-control" name="txtcontrasena">
                        </div>

                      </div>

                      <div class="row py-2">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                          <p class="caja-actualizar-cli">Repetir Contraseña: </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label for="inputPassword1" class="sr-only">Repetir Contraseña</label>
                          <input type="password" id="inputPassword1" class="form-control" name="txtcontrasenarepetir">
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
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="../../feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="../../Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
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