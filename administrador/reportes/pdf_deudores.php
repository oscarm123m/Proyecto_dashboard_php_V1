<?php

	include 'pdf_menu_inventario.php';
	include("../../conexiones/conexion.php");

	$query="SELECT p.NombreP AS nombre, p.Apellido AS Apellido, p.Documento AS Documento, pg.Fecha AS fecha, pg.SaldoPendiente AS saldo FROM persona p, pago pg WHERE p.IdPersona=pg.IdCliente AND pg.Estatus=1 AND pg.SaldoPendiente<>0 AND pg.Estado='Debe' ORDER BY pg.Fecha DESC";
	$resultado=mysqli_query($con,$query);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,6,'REPORTE DE CLIENTES DEUDORES',0,1,'C');
	$pdf->Ln(8);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(20);
	$pdf->Cell(45,6,'NOMBRES',1,0,'C',1);
	$pdf->Cell(45,6,'APELLIDOS',1,0,'C',1);
	$pdf->Cell(30,6,'DOCUMENTO',1,0,'C',1);
	$pdf->Cell(25,6,'FECHA',1,0,'C',1);
	$pdf->Cell(25,6,'DEUDA',1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	while($row=mysqli_fetch_array($resultado))
	{
		$pdf->SetX(20);
		$pdf->Cell(45,10,utf8_decode($row['nombre']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['Apellido']),1,0,'C');
		$pdf->Cell(30,10,$row['Documento'],1,0,'C');
		$pdf->Cell(25,10,$row['fecha'],1,0,'C');
		$pdf->Cell(25,10,'$ '. number_format($row['saldo']),1,1,'C');
	}

	$pdf->OutPut();
?>