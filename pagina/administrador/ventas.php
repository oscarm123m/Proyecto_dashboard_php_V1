<?php
  session_start();
  if (empty($_SESSION['active'])) {
    header('location: ../Iniciar sesion.php');
  }
  include"../../conexiones/conexion.php";

  if($_SESSION['rol']==1){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/estilosproyecto.css"> 
    <link rel="stylesheet" href="../../css/font-awesome.min.css"> 
    <link rel="stylesheet" href="../../style.css">

    <title>COLCHONES LEON</title>
  </head>
<body class="foto1-ini">
  <!--TITULO Y LOGO INICIO-->
    <header id="primero">
      <div class="container">
        <div class="row py-2">

          <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4  text-center">
            <a href=""><img src="../../img/LOGO.jpg" alt="" height="180" width="180" class="img-fluid my-auto"></a>
            
          </div>
          <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 text-center">
            <h1 id="tit1">COLCHONES LEON</h1>
            <h6 id="tit2">"LO SALVAJE Y LA COMODIDAD SE SIENTE"</h6>
            
          </div>
        </div>
        
      </div>
    </header>
      <!--TITULO Y LOGO INICIO-->

    <!--INICIO DE NAVEGADOR 2-->

    <nav class="navbar navbar-expand-lg navbar-light navegador" style="background-color: rgba(240,240,240,0.9);">
      <div class="container">
          <i class="fa fa-home mx-5 fa-2x " aria-hidden="true" style="color: black"></i>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse col-xs-12 col-sm-12 col-md-12 col-lg-8" id="menuprincipal">
            <ul class="nav navbar-nav">
              <li class="nav-item active my-2"><a class="nav-link" href="index.php"><b>INICIO</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="ventas.php"><b>VENTAS</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="usuarios.php"><b>USUARIOS</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="productos.php"><b>PRODUCTOS</b></a></li>

              <li class="navbar-item my-2"><a class="nav-link" href="promociones.php"><b>PROMOCIONES</b></a></li>
            </ul>
          </div>
        
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">

            <div class="btn-group">
              <button type="button" class="" style="font-size: 15px;"><?php echo $_SESSION['user']; ?></button>
              <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="" class="dropdown-item" type="button">Configuracion</a>
                <a href="../salir.php" class="dropdown-item" type="button">Cerrar Sesion</a>
              </div>

          </div>
      </div>
      
    </nav>

    <!--FIN INICIO DE NAVEGADOR 2-->

    
<!--INICIO TEXTO 1-->

<section class="fondo_grafica">
  <div class="container">
    <div class="row py-4">
      <div class="listado1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
        LISTADO DE VENTAS
      </div>
    </div>
    <div class="row py-2">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="table-responsive">
          <table>
            <tr>
              <td ><b><center>COD</center></b></td>
              <td ><b><center>CLIENTE</center></b></td>
              <td ><b><center>PRODUCTOS</center></b></td>
              <td ><b><center>FECHA</center></b></td>
              <td ><b><center>HORA</center></b></td>
              <td ><b><center>ENVIO</center></b></td>
              <td ><b><center>VALOR</center></b></td>
              <td ><b><center>VER</center></b></td>
              <td ><b><center>ESTADO</center></b></td>
            </tr>

            <?php
              $sql_registe=mysqli_query($con,"SELECT COUNT(*) AS cantidad FROM ventaweb");
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


              $consulta="SELECT ventaweb.IdVentaWeb AS cod_venta, usuario.NombreU AS nombre_usuario, usuario.Apellido AS apellido_usuario,(SELECT COUNT(detalleventaweb.IdVentaWeb) FROM detalleventaweb WHERE detalleventaweb.IdVentaWeb=ventaweb.IdVentaWeb)AS cantidad_productos,DATE(ventaweb.FechaHora) AS fecha_venta,time(ventaweb.FechaHora) AS hora_venta, usuario.Direccion AS envio, ventaweb.ValorTotal AS ValorTotal, ventaweb.Estado AS estado FROM ventaweb ,usuario WHERE usuario.IdUsuario=ventaweb.IdUsuario ORDER BY ventaweb.IdVentaWeb DESC LIMIT $desde,$por_pagina";
              $ejecutar=mysqli_query($con,$consulta);
              $i=0;
              while ($fila=mysqli_fetch_array($ejecutar)) {
                $cod_venta=$fila['cod_venta'];
                $nombre=$fila['nombre_usuario'];
                $apellido=$fila['apellido_usuario'];
                $cantidad=$fila['cantidad_productos'];
                $fecha=$fila['fecha_venta'];
                $hora=$fila['hora_venta'];
                $direccion=$fila['envio'];
                $valortotal=$fila['ValorTotal'];
                $estado=$fila['estado'];
                $i++;
                $in=$i+$desde;
            ?>

            <tr>
              <td><?php echo $cod_venta; ?></td>
              <td><?php echo $nombre; ?> <?php echo $apellido; ?></td>
              <td><center><?php echo $cantidad; ?></center></td>
              <td><?php echo $fecha; ?></td>
              <td><?php echo $hora; ?></td>
              <td><?php echo $direccion; ?></td>
              <td>$<?php echo number_format($valortotal); ?></td>

              
              <td><a class="btn_ver_fac" href="#actualizar<?php echo $cod_venta; ?>" data-toggle="modal">VER</a></td>

              <?php if($estado == 'Pendiente'){ ?>
              <td><a class="estado1" href="#actualizar<?php echo $cod_venta; ?>"><?php echo $estado; ?></a></td>
              <?php }else if($estado=='Pagada'){ ?>
              <td><center><a class="estado2" href="#actualizar<?php echo $cod_venta; ?>"><?php echo $estado; ?></a></center></td>
              <?php } ?>

            </tr>

    <!-- Modal actualizar -->
    
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
      </div>
    </div>
  </div>
</section>

<!--FIN TEXTO 1-->

    
  
<!--INICIO PIE DE PAGINA-->

<footer class="centrarCaja8 text-center">
  <div class="container">
    <div class="row py-2">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p><div class="textofeed"><h6>Copyright 2018 © Todos los derechos reservados - COLCHONES LEON -</h6></div></p>
      </div>
    </div>
  </div>
</footer>

<!--FIN PIE DE PAGINA-->

    <!-- Optional JavaScript -->  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/fontawesome-all.js"></script>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script> 
  </body>
</html> 


<?php }else{
  header('location: ../salir.php');
} ?>