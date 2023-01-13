<?php 
	include("../conexiones/conexion.php");


	$consulta="SELECT Fecha, ValorTotal FROM venta WHERE Fecha>'2019-01-01' ORDER BY Fecha ASC";
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
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr=[];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaBarras('<?php echo $datosX ?>');
	datosY=crearCadenaBarras('<?php echo $datosY ?>');

	var data = [
	  {
	    x: datosX,
	    y: datosY,
	    type: 'bar'
	  }
	];

	Plotly.newPlot('graficaBarras', data);
</script>