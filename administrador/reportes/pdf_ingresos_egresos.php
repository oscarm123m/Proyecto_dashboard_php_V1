<?php

	include 'pdf_menu_inventario.php';
	include("../../conexiones/conexion.php");

	$busqueda1=$_POST['busquedapdf1'];
	$busqueda2=$_POST['busquedapdf2'];

	$query="SELECT Fecha, SUM(ValorTotal) AS valor FROM venta WHERE Fecha between '$busqueda1' AND '$busqueda2' AND Estado='Pagada'";
	$resultado=mysqli_query($con,$query);
	$i=1;
	$total00=0;

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,6,'BALANCE DE INGRESOS Y EGRESOS',0,1,'C');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(0,8,'ENTRE '.$busqueda1.' Y '.$busqueda2,0,1,'C');
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,8,'VENTAS',0,1,'C');
	$pdf->Ln(2);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(20,6,utf8_decode('N°'),1,0,'C',1);
	$pdf->Cell(40,6,'Fecha Inicio',1,0,'C',1);
	$pdf->Cell(40,6,'Fecha Fin',1,0,'C',1);
	$pdf->Cell(70,6,'TOTAL',1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	while($row=mysqli_fetch_array($resultado))
	{
		$pdf->SetX(20);
		$pdf->Cell(20,10,$i++,1,0,'C');
		$pdf->Cell(40,10,$busqueda1,1,0,'C');
		$pdf->Cell(40,10,$busqueda2,1,0,'C');
		$pdf->Cell(70,10,'$ '. number_format($row['valor']),1,1,'C');
		$total00=$total00+$row['valor'];
	}

	$pdf->Ln(8);


	$query1="SELECT Fecha, SUM(ValorTotal) AS valor FROM pedido WHERE Fecha between '$busqueda1' AND '$busqueda2'";
	$resultado1=mysqli_query($con,$query1);
	$i1=1;
	$total0=0;


	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,8,'COMPRAS',0,1,'C');
	$pdf->Ln(2);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(20,6,utf8_decode('N°'),1,0,'C',1);
	$pdf->Cell(40,6,'Fecha Inicio',1,0,'C',1);
	$pdf->Cell(40,6,'Fecha Fin',1,0,'C',1);
	$pdf->Cell(70,6,'TOTAL',1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	while($row1=mysqli_fetch_array($resultado1))
	{
		$pdf->SetX(20);
		$pdf->Cell(20,10,$i1++,1,0,'C');
		$pdf->Cell(40,10,$busqueda1,1,0,'C');
		$pdf->Cell(40,10,$busqueda2,1,0,'C');
		$pdf->Cell(70,10,'$ '. number_format($row1['valor']),1,1,'C');
		$total0=$total0+$row1['valor'];
	}
	$pdf->Ln(8);


	$query2="SELECT Recurso, SUM(ValorTotal) AS valor FROM mantenimiento WHERE Fecha between '$busqueda1' AND '$busqueda2' GROUP BY Recurso";
	$resultado2=mysqli_query($con,$query2);
	$i1=1;
	$total1=0;


	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,8,'MANTENIMIENTO',0,1,'C');
	$pdf->Ln(2);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(20,6,utf8_decode('N°'),1,0,'C',1);
	$pdf->Cell(40,6,'Tipo',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha Inicio',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha Fin',1,0,'C',1);
	$pdf->Cell(40,6,'VALOR',1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	while($row2=mysqli_fetch_array($resultado2))
	{
		$pdf->SetX(20);
		$pdf->Cell(20,10,$i1++,1,0,'C');
		$pdf->Cell(40,10,utf8_decode($row2['Recurso']),1,0,'C');
		$pdf->Cell(35,10,$busqueda1,1,0,'C');
		$pdf->Cell(35,10,$busqueda2,1,0,'C');
		$pdf->Cell(40,10,'$ '. number_format($row2['valor']),1,1,'C');
		$total1=$total1+$row2['valor'];
	}
		$pdf->SetFont('Arial','B',11);
		$pdf->SetX(20);
		$pdf->Cell(130,10,'Valor Total =',0,0,'R');
		$pdf->Cell(40,10,'$ '. number_format($total1),1,1,'C');

	$pdf->Ln(8);


	$query3="SELECT (SELECT bodega.NombreB FROM bodega WHERE bodega.IdBodega=egresos.IdBodega) AS nombre, SUM(egresos.ValorTotal) AS valor FROM egresos WHERE Fecha between '$busqueda1' AND '$busqueda2' GROUP BY egresos.IdBodega";
	$resultado3=mysqli_query($con,$query3);
	$i1=1;
	$total2=0;


	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,8,'GASTOS FIJOS',0,1,'C');
	$pdf->Ln(2);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(20,6,utf8_decode('N°'),1,0,'C',1);
	$pdf->Cell(40,6,'Bodega',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha Inicio',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha Fin',1,0,'C',1);
	$pdf->Cell(40,6,'VALOR',1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	while($row3=mysqli_fetch_array($resultado3))
	{
		$pdf->SetX(20);
		$pdf->Cell(20,10,$i1++,1,0,'C');
		$pdf->Cell(40,10,utf8_decode($row3['nombre']),1,0,'C');
		$pdf->Cell(35,10,$busqueda1,1,0,'C');
		$pdf->Cell(35,10,$busqueda2,1,0,'C');
		$pdf->Cell(40,10,'$ '. number_format($row3['valor']),1,1,'C');
		$total2=$total2+$row3['valor'];
	}
		$pdf->SetFont('Arial','B',11);
		$pdf->SetX(20);
		$pdf->Cell(130,10,'Valor Total =',0,0,'R');
		$pdf->Cell(40,10,'$ '. number_format($total2),1,1,'C');


	$pdf->Ln(8);


	$query4="SELECT SUM(contratacion.ValorTotal) AS valor, (SELECT cargo.NombreC FROM cargo WHERE cargo.IdCargo=persona.IdCargo) cargo FROM persona, contratacion WHERE contratacion.FechaPago between '$busqueda1' AND '$busqueda2' AND persona.IdPersona=contratacion.IdPersona GROUP BY persona.IdCargo";
	$resultado4=mysqli_query($con,$query4);
	$i4=1;
	$total3=0;


	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,8,'CONTRATACION',0,1,'C');
	$pdf->Ln(2);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(20,6,utf8_decode('N°'),1,0,'C',1);
	$pdf->Cell(40,6,'Bodega',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha Inicio',1,0,'C',1);
	$pdf->Cell(35,6,'Fecha Fin',1,0,'C',1);
	$pdf->Cell(40,6,'VALOR UNITARIO',1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	while($row4=mysqli_fetch_array($resultado4))
	{
		$pdf->SetX(20);
		$pdf->Cell(20,10,$i4++,1,0,'C');
		$pdf->Cell(40,10,utf8_decode($row4['cargo']),1,0,'C');
		$pdf->Cell(35,10,$busqueda1,1,0,'C');
		$pdf->Cell(35,10,$busqueda2,1,0,'C');
		$pdf->Cell(40,10,'$ '. number_format($row4['valor']),1,1,'C');
		$total3=$total3+$row4['valor'];
	}
		$pdf->SetFont('Arial','B',11);
		$pdf->SetX(20);
		$pdf->Cell(130,10,'Valor Total =',0,0,'R');
		$pdf->Cell(40,10,'$ '. number_format($total3),1,1,'C');



	$pdf->Ln(15);


	$query5="SELECT SUM(contratacion.ValorTotal) AS valor, (SELECT cargo.NombreC FROM cargo WHERE cargo.IdCargo=persona.IdCargo) cargo FROM persona, contratacion WHERE contratacion.FechaPago between '$busqueda1' AND '$busqueda2' AND persona.IdPersona=contratacion.IdPersona GROUP BY persona.IdCargo";
	$resultado5=mysqli_query($con,$query5);
	$total_egresos=$total1+$total2+$total3+$total0;
	$ganancias=$total00-$total_egresos;


	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,8,'BALANCE GENERAL',0,1,'C');
	$pdf->Ln(2);
	$pdf->SetFillColor(20,127,86);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','',12);
	$pdf->SetX(20);
	$pdf->Cell(20,8,utf8_decode('N°'),0,0,'C',1);
	$pdf->Cell(40,8,'TIPO',0,0,'C',1);
	$pdf->Cell(35,8,'Fecha Inicio',0,0,'C',1);
	$pdf->Cell(35,8,'Fecha Fin',0,0,'C',1);
	$pdf->Cell(40,8,'VALOR',0,1,'C',1);


	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(0,0,0);
		$pdf->SetX(20);
		$pdf->Cell(20,10,'1',0,0,'C');
		$pdf->Cell(40,10,'Total de gastos',0,0,'L');
		$pdf->Cell(35,10,$busqueda1,0,0,'C');
		$pdf->Cell(35,10,$busqueda2,0,0,'C');
		$pdf->Cell(40,10,'$ '. number_format($total_egresos),0,1,'C');

		$pdf->SetX(20);
		$pdf->Cell(20,10,'2',0,0,'C');
		$pdf->Cell(40,10,'Ventas',0,0,'L');
		$pdf->Cell(35,10,$busqueda1,0,0,'C');
		$pdf->Cell(35,10,$busqueda2,0,0,'C');
		$pdf->Cell(40,10,'$ '. number_format($total00),0,1,'C');
	
		$pdf->SetFont('Arial','B',13);
		$pdf->SetFillColor(232,232,232);
		$pdf->SetX(20);
		$pdf->Cell(130,10,'Ganancias =',0,0,'R');
		$pdf->Cell(40,10,'$ '. number_format($ganancias),1,1,'C',1);

	$pdf->OutPut();
?>
