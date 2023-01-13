<?php

	include 'pdf_menu_inventario.php';
	include("../../conexiones/conexion.php");

	$query="SELECT p.NombrePro AS nombre, t.NombreT AS nombretipo, p.Medida AS medida, p.ValorUnitario AS valorunitario, p.Existencias AS existencias FROM producto p,tipo t WHERE t.IdTipo=p.IdTipo ORDER BY p.IdProducto ASC";
	$resultado=mysqli_query($con,$query);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,6,'REPORTE DE INVENTARIO',0,1,'C');
	$pdf->Ln(8);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(55,6,'NOMBRE DEL PRODUCTO',1,0,'C',1);
	$pdf->Cell(25,6,'TIPO',1,0,'C',1);
	$pdf->Cell(25,6,'MEDIDA',1,0,'C',1);
	$pdf->Cell(37,6,'VALOR UNITARIO',1,0,'C',1);
	$pdf->Cell(28,6,'EXISTENCIA',1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	while($row=mysqli_fetch_array($resultado))
	{
		$pdf->SetX(20);
		$pdf->Cell(55,10,$row['nombre'],1,0,'C');
		$pdf->Cell(25,10,$row['nombretipo'],1,0,'C');
		$pdf->Cell(25,10,$row['medida'],1,0,'C');
		$pdf->Cell(37,10,'$ '. number_format($row['valorunitario']),1,0,'C');
		$pdf->Cell(28,10,$row['existencias'],1,1,'C');
	}

	$pdf->OutPut();
?>