<?php 
	include("../conexiones/conexion.php");	

	//SELECT MONTH(Fecha) mes, SUM(ValorTotal) Valor FROM venta WHERE year(Fecha)=year(curdate()) GROUP BY mes
	//SELECT Fecha, sum(ValorTotal) FROM venta WHERE year(Fecha)=year(curdate()) group by Fecha ORDER BY Fecha ASC

	$consulta="SELECT MONTHNAME(Fecha) mes, SUM(ValorTotal) Valor FROM venta WHERE year(Fecha)=year(curdate()) AND Estado='Pagada' GROUP BY mes ORDER BY fecha ASC";
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

<script type="text/javascript">

	datosX=crearCadenaLineal('<?php echo $datosX ?>');
	datosY=crearCadenaLineal('<?php echo $datosY ?>');

	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'scatter'
	};


	var data = [trace1];

	Plotly.newPlot('graficaLineal', data);
</script>