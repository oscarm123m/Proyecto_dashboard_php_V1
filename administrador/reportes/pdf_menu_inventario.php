<?php
	require'../../fpdf/fpdf.php';
	include("../../conexiones/conexion.php");

	$query1="SELECT NombreE, Direccion, Nit, Telefono, Email, Regimen FROM empresa";
	$resultado1=mysqli_query($con,$query1);
	$fila=mysqli_fetch_array($resultado1);

	class PDF extends FPDF
	{
		function Header()
		{
			include("../../conexiones/conexion.php");

			$query1="SELECT NombreE, Direccion, Nit, Telefono, Email, Regimen FROM empresa";
			$resultado1=mysqli_query($con,$query1);
			$fila=mysqli_fetch_array($resultado1);

			$this->Image('../../img/logo3.jpg', 35, 15, 40 );
			$this->setFont('Arial','B',15);
			$this->Cell(90);
			$this->Cell(120,8, $fila['NombreE'],0,1,'C');
			$this->setFont('Arial','',9);
			$this->Cell(90);
			$this->Cell(120,5, $fila['Direccion'],0,2,'C');
			$this->Cell(120,5,'NIT:'. $fila['Nit'],0,2,'C');
			$this->Cell(120,5,'Telefono:'. $fila['Telefono'],0,2,'C');
			$this->Cell(120,5,'Email:'. $fila['Email'],0,2,'C');
			$this->Cell(120,5,'Regimen:'. $fila['Regimen'],0,2,'C');

			$this->Ln(8);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
?>