<?php
	require'../../fpdf/fpdf.php';
	include("../../conexiones/conexion.php");

	$query1="SELECT NombreE, Direccion, Nit, Telefono, Email, Regimen FROM empresa";
	$resultado1=mysqli_query($con,$query1);
	$fila=mysqli_fetch_array($resultado1);


	class PDF extends FPDF
	{
		//codigo raro INICIO------------
		var $widths;
		var $aligns;
		function SetWidths($w)
		{
		//Set the array of column widths
		$this->widths=$w;
		}

		function SetAligns($a)
		{
		//Set the array of column alignments
		$this->aligns=$a;
		}

		function Row($data)
		{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=7*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		$this->Rect($x,$y,$w,$h);
		//Print the text
		$this->MultiCell($w,7,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
		}

		function CheckPageBreak($h)
		{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
		}

		function NbLines($w,$txt)
		{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
		$c=$s[$i];
		if($c=="\n")
		{
		$i++;
		$sep=-1;
		$j=$i;
		$l=0;
		$nl++;
		continue;
		}
		if($c==' ')
		$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
		if($sep==-1)
		{
		if($i==$j)
		$i++;
		}
		else
		$i=$sep+1;
		$sep=-1;
		$j=$i;
		$l=0;
		$nl++;
		}
		else
		$i++;
		}
		return $nl;
		}
		//FIN codigo raro----------

		function Header()
		{
			include("../../conexiones/conexion.php");
			$busqueda1=$_POST['id_venta'];
			$query1="SELECT NombreE, Direccion, Nit, Telefono, Email, Regimen FROM empresa";
			$resultado1=mysqli_query($con,$query1);
			$fila=mysqli_fetch_array($resultado1);

			$query2="SELECT venta.IdVenta AS cod, persona.NombreP AS nombre, venta.Fecha AS fecha FROM venta, persona WHERE persona.IdPersona=venta.IdVendedor AND venta.IdVenta='$busqueda1'";
			$resultado2=mysqli_query($con,$query2);
			$fila2=mysqli_fetch_array($resultado2);

			$this->Image('../../img/logo3.jpg', 140, 10, 55 );
			$this->setFont('Arial','B',35);
			$this->Cell(30);
			$this->Cell(80,10, $fila['NombreE'],0,1,'C');

			$this->setFont('Arial','',14);
			$this->Cell(20);
			$this->Cell(50,8,'NIT: '. $fila['Nit'],0,0,'C');
			$this->Cell(40,8,'Regimen: '. $fila['Regimen'],0,1,'C');

			$this->setFont('Arial','B',22);
			$this->Cell(23);
			$this->Cell(80,6,'Colchones en General',0,1,'C');

			$this->setFont('Arial','B',12);
			$this->Cell(34);
			$this->Cell(80,7,'Clinico Cassata - Pillow top - Ortopedico - Basecamas',0,1,'C');

			$this->setFont('Arial','B',20);
			$this->Cell(26);
			$this->Cell(80,8,'Jerson Leon',0,1,'C');

			$this->setFont('Arial','',13);
			$this->SetX(20);
			$this->Cell(170,9,$fila['Direccion'].' Tel.: 789 1447 Cels.:'.$fila['Telefono'],0,1,'C');


			$this->Ln(2);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
?>
<?php


	$busqueda1=$_POST['id_venta'];

	$query="SELECT persona.NombreP AS nombre, persona.Apellido AS apellido, persona.Documento AS documento, persona.Telefono AS telefono, persona.Direccion AS direccion FROM venta, persona WHERE persona.IdPersona=venta.IdPersona AND venta.IdVenta='$busqueda1'";
	$resultado=mysqli_query($con,$query);
	$i=1;
	$row1=mysqli_fetch_array($resultado);

	$query2="SELECT venta.IdVenta AS cod, persona.NombreP AS nombre, venta.Fecha AS fecha FROM venta, persona WHERE persona.IdPersona=venta.IdVendedor AND venta.IdVenta='$busqueda1'";
	$resultado2=mysqli_query($con,$query2);
	$fila2=mysqli_fetch_array($resultado2);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->setFont('Arial','B',14);
	$pdf->SetX(20);
	$pdf->Cell(30,10,'  FECHA:',1,0,'L');
	$pdf->setFont('Arial','',13);
	$pdf->Cell(55,10,$fila2['fecha'],1,0,'C');
	$pdf->setFont('Arial','B',16);
	$pdf->Cell(30,10,'FACTURA',1,0,'C');
	$pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(255,0,0);
	$pdf->Cell(55,10,'N.     '.$fila2['cod'],1,1,'C','true');
	$pdf->setFont('Arial','B',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetX(20);
	$pdf->Cell(170,10,utf8_decode("  SEÑOR: "),1,0,'L');
	$pdf->SetX(45);
	$pdf->setFont('Arial','',13);
	$pdf->Cell(170,10,$row1['nombre'].' '.$row1['apellido'],0,1,'L');
	$pdf->setFont('Arial','B',14);
	$pdf->SetX(20);
	$pdf->Cell(170,10,utf8_decode("  DOCUMENTO: "),1,0,'L');
	$pdf->SetX(60);
	$pdf->setFont('Arial','',13);
	$pdf->Cell(170,10,$row1['documento'],0,1,'L');
	$pdf->setFont('Arial','B',14);
	$pdf->SetX(20);
	$pdf->Cell(170,10,utf8_decode("  TELEFONO: "),1,0,'L');
	$pdf->SetX(60);
	$pdf->setFont('Arial','',13);
	$pdf->Cell(170,10,$row1['telefono'],0,1,'L');
	$pdf->setFont('Arial','B',14);
	$pdf->SetX(20);
	$pdf->Cell(170,10,utf8_decode("  DIRECCION: "),1,0,'L');
	$pdf->SetX(60);
	$pdf->setFont('Arial','',13);
	$pdf->Cell(170,10,$row1['direccion'],0,1,'L');
	$pdf->Ln(2);

	$pdf->SetFillColor(0,0,0);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','',13);
	$pdf->SetX(20);
	$pdf->Cell(13,10,'Cant.',0,0,'C',1);
	$pdf->Cell(29,10,'Nombre',0,0,'C',1);
	$pdf->Cell(18,10,'Medida',0,0,'C',1);
	$pdf->Cell(62,10,'Descripcion',0,0,'C',1);
	$pdf->Cell(24,10,'V.Unit.',0,0,'C',1);
	$pdf->Cell(24,10,'V.Total',0,1,'C',1);

	$query_row="SELECT producto.NombrePro AS nombre, producto.Medida AS medida, detalleventa.Cantidad AS cantidad, detalleventa.precio_venta AS precio, detalleventa.Descripcion as des FROM producto, detalleventa WHERE producto.IdProducto=detalleventa.IdProducto AND detalleventa.IdVenta='$busqueda1'";
	$resultado_row=mysqli_query($con,$query_row);
	$total_row=0;

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(0,0,0);

	//codigo raro
	$pdf->SetWidths(array(13,29,18,62,24,24));
	//codigo raro

	while($row2=mysqli_fetch_array($resultado_row))
	{
		$pdf->SetX(20);
		//codigo raro
		$pdf->Row(array($row2['cantidad'],utf8_decode($row2['nombre']),$row2['medida'],utf8_decode($row2['des']),'$'. number_format($row2['precio']),'$'. number_format($row2['precio'] * $row2['cantidad'])));
		//codigo raro

		$total_row=$total_row+($row2['precio'] * $row2['cantidad']);
	}

		$pdf->SetX(20);
		$pdf->Cell(13,7,'',1,0,'C');
		$pdf->Cell(29,7,'',1,0,'C');
		$pdf->Cell(18,7,'',1,0,'C');
		$pdf->Cell(62,7,'',1,0,'C');
		$pdf->Cell(24,7,'',1,0,'C');
		$pdf->Cell(24,7,'',1,1,'C');

		$pdf->SetX(20);
		$pdf->Cell(13,7,'',1,0,'C');
		$pdf->Cell(29,7,'',1,0,'C');
		$pdf->Cell(18,7,'',1,0,'C');
		$pdf->Cell(62,7,'',1,0,'C');
		$pdf->Cell(24,7,'',1,0,'C');
		$pdf->Cell(24,7,'',1,1,'C');

		$pdf->SetFont('Arial','',10);
		$pdf->SetX(20);
		$pdf->Cell(13,7,'',1,0,'C');
		$pdf->Cell(29,7,'',1,0,'C');
		$pdf->Cell(18,7,'',1,0,'C');
		$pdf->Cell(62,7,'',1,0,'C');
		$pdf->Cell(24,7,'ABONO',1,0,'C');
		$pdf->Cell(24,7,'',1,1,'C');

		$pdf->SetX(20);
		$pdf->Cell(13,7,'',1,0,'C');
		$pdf->Cell(29,7,'',1,0,'C');
		$pdf->Cell(18,7,'',1,0,'C');
		$pdf->Cell(62,7,'',1,0,'C');
		$pdf->Cell(24,7,'SALDO',1,0,'C');
		$pdf->Cell(24,7,'',1,1,'C');

		$pdf->SetFont('Arial','B',10);
		$pdf->SetX(20);
		$pdf->Cell(13,10,'',1,0,'C');
		$pdf->Cell(109,10,'OBSERVACIONES:',1,0,'L');
		$pdf->Cell(24,10,'TOTAL$',1,0,'C');
		$pdf->Cell(24,10,'$ '.number_format($total_row),1,1,'C');

		$pdf->SetX(20);
		$pdf->SetFont('Arial','I'.'B',9);
		$pdf->Cell(170,7,'TODO TRABAJO SE INICIA CON EL 50% DE ABONO',0,1,'C');

		$pdf->SetX(20);
		$pdf->SetFont('Arial','I'.'B',14);
		$pdf->Cell(85,7,' ABONO $',1,0,'L');
		$pdf->Cell(85,7,' SALDO $',1,1,'L');

		$pdf->SetX(20);
		$pdf->SetFont('Arial','I'.'B',6);
		$pdf->Cell(170,4,'ESTA FACTURA DE VENTA CUMPLE LOS REQUISITOS DE LA LEY 12-31 DEL 17 DE JULIO DE 2008 Y PRESTA MERITO EJECUTIVO DE CONFORMIDAD',0,1,'C');
		$pdf->SetX(20);
		$pdf->Cell(170,4,'CON LOS ARTICULOS 772 Y SUBSIGUIENTES DEL CODIGO DE COMERCIO',0,1,'C');
		$pdf->SetX(20);
		$pdf->Cell(170,4,'NOTA: PASADAS 48 HORAS HABILES DESPUES DE LA ENTREGA NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES',0,1,'C');
		$pdf->Ln(4);

		$pdf->SetX(20);
		$pdf->SetFont('Arial','I'.'B',14);
		$pdf->Cell(85,7,'____________________',0,0,'L');
		$pdf->Cell(85,7,'____________________',0,1,'L');

		$pdf->SetX(20);
		$pdf->SetFont('Arial','I'.'B',8);
		$pdf->Cell(85,4,'Firma Cliente',0,0,'L');
		$pdf->Cell(85,4,'Firma Autoriza',0,1,'L');

		$pdf->SetX(20);
		$pdf->SetFont('Arial','I'.'B',8);
		$pdf->Cell(85,4,'C.C.',0,1,'L');

		$pdf->Ln(10);
		$pdf->SetX(20);
		$pdf->SetFont('Arial','I'.'B',13);
		$pdf->Cell(170,8,utf8_decode('¡Gracias por su compra!'),0,1,'C');

	$pdf->OutPut();
?>