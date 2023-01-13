<?php 
	include"../../../conexiones/conexion.php";

	session_start();
	 if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
  }

  if (!empty($_POST)) {
  	# code...


  	//Buscar cliente
  	if ($_POST['action']=='searchCliente') {
  		if (!empty($_POST['cliente'])) {
  			$doc=$_POST['cliente'];

  			$query=mysqli_query($con,"SELECT * FROM persona WHERE Documento LIKE '$doc' AND IdCargo=3");
  			$result=mysqli_num_rows($query);
  			$data='';
  			if ($result>0) {
  				$data=mysqli_fetch_assoc($query);
  			} else {
  				$data=0;
  			}
  			echo json_encode($data,JSON_UNESCAPED_UNICODE);
  			
  		}
  	}

    //Registrar cliente - ventas

    if ($_POST['action']=='addCliente'){

      $nombre=$_POST['nom_cliente'];
      $apellido=$_POST['ape_cliente'];
      $documento=$_POST['doc_cliente'];
      $telefono=$_POST['tel_cliente'];

      $query_insert=mysqli_query($con,"INSERT INTO persona(IdCargo, NombreP, Apellido, Documento, Telefono) VALUES(3,'$nombre','$apellido','$documento','$telefono')");

      if ($query_insert) {
        $codCliente=mysql_insert_id($con);
        $msg=$codCliente;
      } else {
        $msg='error';
      }
      mysqli_close($con);
      echo $msg;
      exit;
      
    }

    //Registrar deuda a un cliente
    if ($_POST['action']=='addClienteDoc') {
      $idcliente=$_POST['idCliente_fijo'];
      $documento=$_POST['doc_cliente'];
      $fecha=$_POST['fec_cliente'];
      $abono=$_POST['abo_cliente'];
      $saldo=$_POST['sal_cliente'];
      $saldo_pend=$saldo-$abono;

      
      $query_insert=mysqli_query($con,"INSERT INTO pago(IdCliente, Fecha, SaldoPagar, ValorFactura, Estatus,SaldoPendiente,Estado) VALUES('$idcliente','$fecha','$abono','$saldo',1,'$saldo_pend','Debe')");
        if ($query_insert) {
        $codCliente=mysql_insert_id($con);
        $msg=$codCliente;
        } else {
          $msg='error';
        }
      
      mysqli_close($con);
      echo $msg;
      exit;
      
    }

    //Buscar cliente drow list
    if ($_POST['action']=='searchCliente_fijo') {
        $id_cliente=$_POST['cliente'];

        $query=mysqli_query($con,"SELECT IdPersona, NombreP, Apellido, Documento, Telefono, Direccion FROM persona WHERE IdPersona=$id_cliente");
        $result=mysqli_num_rows($query);
        $data='';
        if ($result>0) {
          $data=mysqli_fetch_assoc($query);
        } else {
          $data=0;
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        
      
    }
    


    //consultar producto
    if ($_POST['action']=='infoProducto') {
      $producto_id=$_POST['producto'];

      $consulta="SELECT IdProducto, NombrePro, Existencias, ValorUnitario FROM producto WHERE IdProducto=$producto_id";
      $query=mysqli_query($con,$consulta);
      $result=mysqli_num_rows($query);
      mysqli_close($con);
      
      if ($result>0) {
        $data=mysqli_fetch_assoc($query);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit;
      }
      echo "error";
      exit;
      
    }

    //agregar producto al detalle temporal
    if ($_POST['action']=='addProductoDetalle') {
      if (empty($_POST['producto']) || empty($_POST['cantidad'])) {
        echo 'error';
      } else {
        $codproducto=$_POST['producto'];
        $cantidad=$_POST['cantidad'];
        $token=md5($_SESSION['idUser']);

        $query_detalle_temp=mysqli_query($con,"CALL add_detalle_temp($codproducto,$cantidad,'$token')");
        $result=mysqli_num_rows($query_detalle_temp);

        $detalleTabla='';
        $sub_total=0;
        $total=0;
        $arrayData=array();

        if ($result > 0) {
          while ($data=mysqli_fetch_assoc($query_detalle_temp)) {
            $precioTotal=round($data['cantidad'] * $data['precio_venta'], 2);
            $sub_total=round($sub_total+$precioTotal, 2);
            $total=round($total+$precioTotal, 2);

            $detalleTabla .='<tr>
                            <td>'.$data['codproducto'].'</td>
                            <td colspan="2">'.$data['NombrePro'].'</td>
                            <td class="textcenter">'.$data['cantidad'].'</td>
                            <td class="textright">'.$data['precio_venta'].'</td>
                            <td class="textright">'.$precioTotal.'</td>
                            <td class="">
                              <a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle('.$data['Correlativo'].');"><i class="far fa-trash-alt" style="color:red;"></i></a>
                            </td>
                          </tr>';
          }
          $total1=round($sub_total, 2);

          $detalleTotales='<tr>
                              <td colspan="5" class="textright">TOTAL  Q.</td>
                              <td class="textright">'.$total1.'</td>
                            </tr>';

          $arrayData['detalle']=$detalleTabla;
          $arrayData['totales']=$detalleTotales;

          echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
        }else{
          echo 'error';
        }
        mysqli_close($con);

      }
      exit;
      
    }


    //Extrae datos del detalle temp
    if ($_POST['action']=='serchForDetalle') {
      if (empty($_POST['user'])) {
        echo 'error';
      } else {
        $token=md5($_SESSION['idUser']);

        $query=mysqli_query($con,"SELECT tmp.Correlativo, tmp.token_user, tmp.cantidad, tmp.precio_venta, p.IdProducto, p.NombrePro FROM detalle_temp tmp INNER JOIN producto p ON tmp.codproducto=p.IdProducto WHERE token_user='$token' ");

        $result=mysqli_num_rows($query);

        $detalleTabla='';
        $sub_total=0;
        $total=0;
        $arrayData=array();

        if ($result > 0) {
          while ($data=mysqli_fetch_assoc($query)) {
            $precioTotal=round($data['cantidad'] * $data['precio_venta'], 2);
            $sub_total=round($sub_total+$precioTotal, 2);
            $total=round($total+$precioTotal, 2);

            $detalleTabla .='<tr>
                            <td>'.$data['IdProducto'].'</td>
                            <td colspan="2">'.$data['NombrePro'].'</td>
                            <td class="textcenter">'.$data['cantidad'].'</td>
                            <td class="textright">'.$data['precio_venta'].'</td>
                            <td class="textright">'.$precioTotal.'</td>
                            <td class="">
                              <a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle('.$data['Correlativo'].');"><i class="far fa-trash-alt" style="color:red;"></i></a>
                            </td>
                          </tr>';
          }
          $total1=round($sub_total, 2);

          $detalleTotales='<tr>
                              <td colspan="5" class="textright">TOTAL  Q.</td>
                              <td class="textright">'.$total1.'</td>
                            </tr>';

          $arrayData['detalle']=$detalleTabla;
          $arrayData['totales']=$detalleTotales;

          echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
        }else{
          echo 'error';
        }
        mysqli_close($con);

      }
      exit;
      
    }

    //eliminar datos del detalle temp
    if ($_POST['action']=='delProductoDetalle') {
      if (empty($_POST['id_detalle'])) {
        echo 'error';
      } else {
        $id_detalle=$_POST['id_detalle'];
        $token=md5($_SESSION['idUser']);


        $query_detalle_temp=mysqli_query($con,"CALL del_detalle_temp($id_detalle,'$token')");
        $result=mysqli_num_rows($query_detalle_temp);
        

        $detalleTabla='';
        $sub_total=0;
        $total=0;
        $arrayData=array();

        if ($result > 0) {
          while ($data=mysqli_fetch_assoc($query_detalle_temp)) {
            $precioTotal=round($data['cantidad'] * $data['precio_venta'], 2);
            $sub_total=round($sub_total+$precioTotal, 2);
            $total=round($total+$precioTotal, 2);

            $detalleTabla .='<tr>
                            <td>'.$data['codproducto'].'</td>
                            <td colspan="2">'.$data['NombrePro'].'</td>
                            <td class="textcenter">'.$data['cantidad'].'</td>
                            <td class="textright">'.$data['precio_venta'].'</td>
                            <td class="textright">'.$precioTotal.'</td>
                            <td class="">
                              <a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle('.$data['Correlativo'].');"><i class="far fa-trash-alt" style="color:red;"></i></a>
                            </td>
                          </tr>';
          }
          $total1=round($sub_total, 2);

          $detalleTotales='<tr>
                              <td colspan="5" class="textright">TOTAL  Q.</td>
                              <td class="textright">'.$total1.'</td>
                            </tr>';

          $arrayData['detalle']=$detalleTabla;
          $arrayData['totales']=$detalleTotales;

          echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
        }else{
          echo 'error';
        }
        mysqli_close($con);

      }
      exit;
      
    }

    //Anular venta
    if ($_POST['action']=='anularVenta') {
      
      $token=md5($_SESSION['idUser']);
      $query_del=mysqli_query($con,"DELETE FROM detalle_temp WHERE token_user='$token' ");
      if ($query_del) {
        echo "ok";
      } else {
        echo "error";
      }
      exit;
      
    }

    //Facturar venta
    if ($_POST['action']=='procesarVenta') {

      if ($_POST['codcliente']) {
        $codcliente=$_POST['codcliente'];
      }
      $token=md5($_SESSION['idUser']);
      $usuario=$_SESSION['idUser'];

      $query=mysqli_query($con,"SELECT * FROM detalle_temp WHERE token_user='$token'");
      $result=mysqli_num_rows($query);

      if ($result>0) {
        $query_procesar=mysqli_query($con,"CALL procesar_venta($usuario,$codcliente,'$token')");
        $result_detalle=mysqli_num_rows($query_procesar);

        if ($result_detalle>0) {
          $data=mysqli_fetch_assoc($query_procesar);
          echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }else{
          echo "error";
        }
      }else{
        echo "error";
      }
    }

  }
  
?>