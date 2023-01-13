<?php

	include 'pdf_menu_inventario.php';
	include("../../conexiones/conexion.php");

	$busqueda1=$_POST['busquedapdf1'];
	$busqueda2=$_POST['busquedapdf2'];

	$query="SELECT Fecha AS fe, sum(ValorTotal) AS Valor FROM venta WHERE Fecha BETWEEN '$busqueda1' AND '$busqueda2' AND Estado='Pagada' group by Fecha ORDER BY Fecha DESC";
	$resultado=mysqli_query($con,$query);
	$i=1;

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,6,'REPORTE VENTAS',0,1,'C');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(0,8,'ENTRE '.$busqueda1.' Y '.$busqueda2,0,1,'C');
	$pdf->Ln(8);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(40,6,utf8_decode('N°'),1,0,'C',1);
	$pdf->Cell(55,6,'Fecha',1,0,'C',1);
	$pdf->Cell(75,6,'VALOR UNITARIO',1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	while($row=mysqli_fetch_array($resultado))
	{
		$pdf->SetX(20);
		$pdf->Cell(40,10,$i++,1,0,'C');
		$pdf->Cell(55,10,$row['fe'],1,0,'C');
		$pdf->Cell(75,10,'$ '. number_format($row['Valor']),1,1,'C');
	}

	$pdf->OutPut();
?>