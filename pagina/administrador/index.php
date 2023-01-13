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


<!--grafica de ventas-->
<section class="fondo_grafica">
  <div class="container">
    <?php  

      $consulta="SELECT MONTHNAME(FechaHora) mes, SUM(ValorTotal) Valor FROM ventaweb WHERE year(FechaHora)=year(curdate()) GROUP BY mes ORDER BY FechaHora ASC";
      $result=mysqli_query($con,$consulta);
      $valoresY=array();//Dinero
      $valoresX=array();//Fechas

      while ($ver=mysqli_fetch_row($result)) {
        $valoresY[]=$ver[1];
        $valoresX[]=$ver[0];
      }

      $datosX=json_encode($valoresX);
      $datosY=json_encode($valoresY);


    ?>


    <div id="graficaBarras">
      
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
  </div>
</section>
<!--fin grafica de ventas-->


  
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
    <script src="../../js/plotly-latest.min.js"></script>
    <script type="text/javascript">

      datosX=crearCadenaLineal('<?php echo $datosX ?>');
      datosY=crearCadenaLineal('<?php echo $datosY ?>');

      var data = [
        {
          x: datosX,
          y: datosY,
          type: 'bar'
        }
      ];

      Plotly.newPlot('graficaBarras', data);
    </script> 
  </body>
</html> 


<?php }else{
  header('location: ../salir.php');
} ?>