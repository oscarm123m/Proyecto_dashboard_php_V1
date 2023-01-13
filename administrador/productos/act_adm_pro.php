<?php

  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
  }
  include("../../conexiones/conexion.php");

  if($_SESSION['rol']==1){
?>
<?php

  if (empty($_REQUEST['actualizar'])) {
    header('location: select_adm_pro.php');
  }else{

    $editar_id=$_GET['actualizar'];
    if (!is_numeric($editar_id)) {
      header('location: select_adm_pro.php');
    }
    $classRemove='notBlock';
    $foto='';
    $consulta="SELECT * FROM producto WHERE IdProducto='$editar_id'";
    $ejecutar=mysqli_query($con,$consulta);
    $fila=mysqli_fetch_array($ejecutar);
    $nombre=$fila['NombrePro'];
    $caracteristicas=$fila['Caracteristicas'];
    $medida=$fila['Medida'];
    $altura=$fila['Altura'];
    $garantia=$fila['Garantia'];
    $existencias=$fila['Existencias'];
    $valorunitario=$fila['ValorUnitario'];
    $imagen=$fila['Ruta_Imagen'];
    if ($imagen!=null) {
      $classRemove='';
      $foto='<img id="img" src="../../img/imgproductos/'.$imagen.'">';
    }
    if ( $imagen=='img_producto.png') {
      $foto='';
      $classRemove='notBlock';
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
                <a class="nav-link active" href="../productos/select_adm_pro.php">
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
            <h1 class="h2">PRODUCTOS</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              
              <div class="btn-group mr-2">
                <div class="caja2-tra">ADMINISTRADOR</div>
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
              ACTUALIZAR PRODUCTO
            </div>

            <div class="listado1 col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <!--LISTADO DE EGRESOS-->
            </div>

            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
              <div class="mover d-flex justify-content-center">

                <form class="mover d-flex justify-content-end" name="insert" method="post" action="insert_adm_pro.php">
                  <input class="boton3-ini-nuevo" type="submit" name="NUEVO" value="NUEVO">
                </form>

              </div>
            </div>
          </div>

          <div>

            <hr>

          	<form method="post" action="" enctype="multipart/form-data">

              <!--fila-->
              <div class="row py-2">
                <!--fila-->


                <!--caja1-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 margen_insertar_imagen">
                  <!--caja1-->

                  <div class="row d-flex justify-content-center">
                    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-4 imagen-producto">
                      Imagen
                    </div>
                  </div>

                  <hr class="linea-producto">

                  <div class="row d-flex justify-content-center">
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 estilos-imagen text-center">

                      <div class="photo">
                        <label for="foto" class="boton-clic">Clic para agregar foto<br><i class="fas fa-arrow-down icono"></i></label>
                              <div class="prevPhoto">
                              <span class="delPhoto <?php echo $classRemove; ?>">X</span>
                              <label for="foto"></label>
                              <?php echo $foto; ?>
                              </div>
                              <div class="upimg">
                              <input type="file" name="foto" id="foto">
                              </div>
                              <div id="form_alert"></div>
                      </div>

                    </div>
                  </div>
<hr>
                <!--caja1-->
                </div>
                <!--caja1-->


                <!--caja2-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 margen_insertar_producto">
                <!--caja2-->

              		<div class="caja-actualizar">


                    <div class="row">
                      <div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 detalle-producto">
                        Detalles del producto
                      </div>
                    </div>

                    <hr class="linea-producto">

                    <div class="row py-2 mover-producto">
<!---->             <!---->
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
              			
                  			<div class="row py-2">

                  				<div class="col-xs-12 col-sm-12 col-md-122 col-lg-3">
                  					<p class="producto_estilos">Nombre: </p>
                  				</div>
                  				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                            <label for="inputName" class="sr-only">Nombre del Producto</label>
                            <input type="text" id="inputName" class="form-control" placeholder="Nombre del Producto" name="txtNombre" value="<?php echo $nombre; ?>" required>
                  				</div>

                  			</div>

                      </div>
                      <!---->
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">


                        <div class="row py-2">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <p class="producto_estilos">Medida Estandar: </p>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                            <label for="inputMedida" class="sr-only">Medida Estandar</label>
                            <input type="text" id="inputMedida" class="form-control" placeholder="Medida Estandar" name="txtMedida" value="<?php echo $medida; ?>" required>
                          </div>

                        </div>

                      </div>
                    <!---->
                    </div>



                    <div class="row py-2">

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">

                        <div class="row py-2">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <p class="producto_estilos">Tipo de Producto: </p>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">

                            <?php
                              $buscar=mysqli_query($con,"SELECT p.IdProducto AS IdProducto, t.NombreT AS nombretipo, p.IdTipo AS tipo FROM producto p, tipo t WHERE t.IdTipo=p.IdTipo AND p.IdProducto='$editar_id'");
                              $result_sql=mysqli_fetch_array($buscar);
                              $idtipo=$result_sql['tipo'];
                              $nombretipo=$result_sql['nombretipo'];
                            ?>

                            <select name="selectTipo" class="notItemOne form-control">

                              <?php

                                echo "<option value=".$result_sql['tipo'].">".$result_sql['nombretipo']."</option>";

                                $sql=mysqli_query($con,"select * from tipo");
                                while ($res=mysqli_fetch_array($sql)) {
                                  $nombretipo = $res['NombreT'];
                                  $idtipo = $res['IdTipo'];
                                  echo "<option value='$idtipo'>$nombretipo</option>";
                                }
                              ?>

                            </select>
                          </div>

                        </div>

                      </div>


                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">

                        <div class="row py-2">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <p class="producto_estilos">Altura: </p>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                            <label for="inputAltura" class="sr-only">Altura</label>
                            <input type="text" id="inputAltura" class="form-control" placeholder="Altura" name="txtAltura" value="<?php echo $altura; ?>" required>
                          </div>

                        </div>

                      </div>

                    </div>
                    
                    <hr class="linea-producto">



              			<div class="row py-2">

              				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
              					<p class="producto_estilos">Caracteristicas: </p>
              				</div>
              				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                        <textarea name="txtCaracteristicas" cols="25" rows="8" class="form-control" value="<?php echo $caracteristicas; ?>" required><?php echo $caracteristicas ?></textarea>
                        <form action="cgi-bin/control.exe" method="post" enctype="text/plain" name="miform">
              				</div>

              			</div>

                    <hr class="linea-producto">


                    <div class="row py-2">

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">

                        <div class="row py-2">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <p class="producto_estilos">Garantia: </p>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                            <label for="inputGarantia" class="sr-only">Garantia</label>
                            <input type="text" id="inputGarantia" class="form-control" placeholder="Garantia" name="txtGarantia" value="<?php echo $garantia; ?>" required>
                          </div>

                        </div>

                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">

                        <div class="row py-2">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <p class="producto_estilos">Existencias: </p>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                            <label for="inputExistencias" class="sr-only">Existencias</label>
                            <input type="number" id="inputExistencias" class="form-control" placeholder="Existencias" name="txtExistencias" value="<?php echo $existencias; ?>" required>
                          </div>

                        </div>

                      </div>

                    </div>


                    <div class="row py-2">

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">

                        <div class="row py-2">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <p class="producto_estilos">Valor Unitario: </p>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                            <label for="inputValor" class="sr-only">Valor Unitario</label>
                            <input type="number" id="inputValor" class="form-control" placeholder="Valor Unitario" name="txtValor" value="<?php echo $valorunitario; ?>" required>
                          </div>

                        </div>

                      </div>

                    </div>


              			<div class="row py-2">

              				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="d-flex justify-content-center">
              					 <input class="boton-insertar" type="submit" name="actualizar" value="Actualizar">
              				  </div>
                      </div>
                      
              			</div>

              		</div>



              <!--caja2-->
              </div>
              <!--caja2-->



            <!--fila-->
            </div>
            <!--fila-->

          	</form>

          	<?php
          		if (isset($_POST['actualizar'])) {

                if (empty($_POST['txtNombre']) || empty($_POST['selectTipo']) || empty($_POST['txtCaracteristicas']) || empty($_POST['txtMedida']) || empty($_POST['txtAltura']) || empty($_POST['txtGarantia']) || empty($_POST['txtExistencias']) || empty($_POST['txtValor'])) {
                  echo "<script>alert('Error')</script>";
                } else {
                  $nombre=$_POST['txtNombre'];
                  $idtipo=$_POST['selectTipo'];
                  $caracteristicas=$_POST['txtCaracteristicas'];
                  $medida=$_POST['txtMedida'];
                  $altura=$_POST['txtAltura'];
                  $garantia=$_POST['txtGarantia'];
                  $existencias=$_POST['txtExistencias'];
                  $valorunitario=$_POST['txtValor'];

                  $foto=$_FILES['foto'];
                  $nombre_foto=$foto['name'];
                  $type=$foto['type'];
                  $url_temp=$foto['tmp_name'];
                  $foto1=$imagen;


                  if ($nombre_foto!='') {
                    $destino='../../img/imgproductos/';
                    $img_nombre='img_'.md5(date('d-m-Y H:m:s'));
                    $imgProducto=$img_nombre.'.jpg';
                    $src=$destino.$imgProducto;
                  }
                  if ($nombre_foto=='') {
                    $imgProducto=null;
                  }

                  if ($imgProducto!=$foto1) {
                    unlink('../../img/imgproductos/'.$foto1);
                  }
                  

                  $actualizar="UPDATE producto SET NombrePro='$nombre', IdTipo=$idtipo, Caracteristicas='$caracteristicas', Medida='$medida', Altura='$altura', Garantia='$garantia', Existencias='$existencias', ValorUnitario='$valorunitario', Ruta_Imagen='$imgProducto' WHERE IdProducto=$editar_id ";
                  $ejecutar=mysqli_query($con,$actualizar);

                  if ($ejecutar) {
                    
                    if ($nombre_foto!='') {
                      move_uploaded_file($url_temp, $src);
                    }
                    echo "<script>alert('Registro Actualizado')</script>";
                    echo "<script>window.open('select_adm_pro.php','_self')</script>";
                  }else{
                    echo "<script>alert('Error')</script>";
                  }
                }	
          		}
          	?>
            
          </div>

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
    <script src="../../js/functions.js"></script>
</body>
</html>

<?php }else{
  header('location: ../../salir.php');
} ?>