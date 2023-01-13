<?php 
	include"../../conexiones/conexion.php";

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

    //Buscar proveedor
    if ($_POST['action']=='searchProveedor') {
      if (!empty($_POST['proveedor'])) {
        $doc=$_POST['proveedor'];

        $query=mysqli_query($con,"SELECT * FROM proveedor WHERE Nit LIKE '$doc'");
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
     //Registrar detallepedido==PEDIDO

    if ($_POST['action']=='addDetallePedido'){

      $articulo=$_POST['txt_art_pedido'];
      $cantidad=$_POST['txt_cant_pedido'];
      $unidadmedida=$_POST['txt_uni_med_pedido'];
      $valorunitario=$_POST['txt_valor_uni_pedido'];
      $token=md5($_SESSION['idUser']);

      $query_insert=mysqli_query($con,"INSERT INTO detalle_temp_pedido(token_user, articulo, cantidad, UnidadMedida, precio_venta) VALUES ('$token','$articulo','$cantidad','$unidadmedida','$valorunitario')");
      $consult=mysqli_query($con,"SELECT * FROM detalle_temp_pedido WHERE token_user='$token'");
      $result=mysqli_num_rows($consult);

      $detalleTabla='';
      $sub_total=0;
      $total=0;
      $arrayData=array();

      if ($result > 0) {
        while ($data=mysqli_fetch_assoc($consult)) {
          $precioTotal=round($data['cantidad'] * $data['precio_venta'], 2);
          $sub_total=round($sub_total+$precioTotal, 2);
          $total=round($total+$precioTotal, 2);

          $detalleTabla .='<tr>
                          <td>'.$data['articulo'].'</td>
                          <td>'.$data['UnidadMedida'].'</td>
                          <td>'.$data['cantidad'].'</td>
                          <td>'.number_format($data['precio_venta']).'</td>
                          <td>'.$precioTotal.'</td>
                          <td class="">
                            <a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle_pedido('.$data['Correlativo1'].');"><i class="far fa-trash-alt" style="color:red;"></i></a>
                          </td>
                        </tr>';
        }
        $total1=round($sub_total, 2);

        $detalleTotales='<tr>
                            <td colspan="3"></td>
                            <td>TOTAL  Q.</td>
                            <td>'.$total1.'</td>
                          </tr>';

        $arrayData['detalle']=$detalleTabla;
        $arrayData['totales']=$detalleTotales;

        echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
      }else{
        echo 'error';
      }
      mysqli_close($con);
      exit;
      
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

    //Extrae datos del detalle temp == COMPRAS
    if ($_POST['action']=='serchForDetallePedido') {
      if (empty($_POST['user'])) {
        echo 'error';
      } else {
        $token=md5($_SESSION['idUser']);

        $query=mysqli_query($con,"SELECT * FROM detalle_temp_pedido WHERE token_user='$token'");

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
                            <td>'.$data['articulo'].'</td>
                            <td>'.$data['UnidadMedida'].'</td>
                            <td>'.$data['cantidad'].'</td>
                            <td>'.number_format($data['precio_venta']).'</td>
                            <td>'.$precioTotal.'</td>
                            <td class="">
                              <a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle_pedido('.$data['Correlativo1'].');"><i class="far fa-trash-alt" style="color:red;"></i></a>
                            </td>
                          </tr>';
          }
          $total1=round($sub_total, 2);

          $detalleTotales='<tr>
                              <td colspan="3"></td>
                              <td>TOTAL  Q.</td>
                              <td>'.$total1.'</td>
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
    if ($_POST['action']=='delProductoDetallePedido') {
      if (empty($_POST['id_detalle'])) {
        echo 'error';
      } else {
        $id_detalle=$_POST['id_detalle'];
        $token=md5($_SESSION['idUser']);


        $query_detalle_temp=mysqli_query($con,"DELETE FROM detalle_temp_pedido WHERE Correlativo1='$id_detalle' AND token_user='$token'");
        $consult=mysqli_query($con,"SELECT * FROM detalle_temp_pedido WHERE token_user='$token'");
        $result=mysqli_num_rows($consult);
        

        $detalleTabla='';
        $sub_total=0;
        $total=0;
        $arrayData=array();

        if ($result > 0) {
          while ($data=mysqli_fetch_assoc($consult)) {
            $precioTotal=round($data['cantidad'] * $data['precio_venta'], 2);
            $sub_total=round($sub_total+$precioTotal, 2);
            $total=round($total+$precioTotal, 2);

            $detalleTabla .='<tr>
                            <td>'.$data['articulo'].'</td>
                            <td>'.$data['UnidadMedida'].'</td>
                            <td>'.$data['cantidad'].'</td>
                            <td>'.number_format($data['precio_venta']).'</td>
                            <td>'.$precioTotal.'</td>
                            <td class="">
                              <a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle_pedido('.$data['Correlativo1'].');"><i class="far fa-trash-alt" style="color:red;"></i></a>
                            </td>
                          </tr>';
          }
          $total1=round($sub_total, 2);

          $detalleTotales='<tr>
                              <td colspan="3"></td>
                              <td>TOTAL  Q.</td>
                              <td>'.$total1.'</td>
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

    //Anular pedido==PEDIDO
    if ($_POST['action']=='anularPedido') {
      
      $token=md5($_SESSION['idUser']);
      $query_del=mysqli_query($con,"DELETE FROM detalle_temp_pedido WHERE token_user='$token' ");
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

    //Facturar pedido==PEDIDO
    if ($_POST['action']=='procesarPedido') {

      $codcliente1=$_POST['codcliente'];
      $nofac=$_POST['nofac'];
      $deudapendiente=$_POST['deuda'];

      
      
      if($nofac!=''){
        $token=md5($_SESSION['idUser']);
        $usuario=$_SESSION['idUser'];

        $query=mysqli_query($con,"SELECT * FROM detalle_temp_pedido WHERE token_user='$token'");
        $result=mysqli_num_rows($query);

        if ($result>0) {

          $query_sum_total=mysqli_query($con,"SELECT * FROM detalle_temp_pedido WHERE token_user='$token'");
          $total=0;
          while ($row=mysqli_fetch_array($query_sum_total)) {
            $cantidad=$row['cantidad'];
            $precioventa=$row['precio_venta'];
            $total=$total+($cantidad*$precioventa);
          }
          //
          if ($codcliente1=='') {
            $query_insert_pedido=mysqli_query($con,"INSERT INTO pedido(Fecha, ValorTotal, NoFac) VALUES(CURDATE(), '$total', '$nofac' )");
          } else if($codcliente1!='') {
            $codcliente=$_POST['codcliente'];
            $query_insert_pedido=mysqli_query($con,"INSERT INTO pedido(IdProveedor, Fecha, ValorTotal, NoFac) VALUES('$codcliente',CURDATE(), '$total', '$nofac' )");
          }
          
          //
          $query_select_id_ped=mysqli_query($con,"SELECT * FROM pedido ORDER BY IdPedido DESC LIMIT 1");
          $row2=mysqli_fetch_array($query_select_id_ped);
          $id_pedido=$row2['IdPedido'];

          $query_sum_total_2=mysqli_query($con,"SELECT * FROM detalle_temp_pedido WHERE token_user='$token'");

          while ($row3=mysqli_fetch_array($query_sum_total_2)) {
            $cantidad2=$row3['cantidad'];
            $articulo2=$row3['articulo'];
            $unidadmedida2=$row3['UnidadMedida'];
            $precioventa2=$row3['precio_venta'];
            $insert_detalle_pedido=mysqli_query($con,"INSERT INTO detallepedido(IdPedido, Articulo, Cantidad, UnidadMedida, ValorUnitario) VALUES('$id_pedido','$articulo2','$cantidad2','$unidadmedida2','$precioventa2') ");
          }
          //-------
          $saldo_a_pagar=$total-$deudapendiente;
          if ($deudapendiente!='' && $codcliente1!='') {
            $insert_detalle_pedido=mysqli_query($con,"INSERT INTO cuentapendiente(IdPedido, IdProveedor, SaldoPagar, ValorFacura, Fecha,Descripcion, Estatus, SaldoPendiente, Estado) VALUES('$id_pedido','$codcliente1','$saldo_a_pagar','$total',CURDATE(),'Ninguna','1','$deudapendiente','Se debe') ");
          } else {
            # code...
          }
          //-------

          $delete_det_tem=mysqli_query($con,"DELETE FROM detalle_temp_pedido WHERE token_user='$token' ");

          $query_procesar=mysqli_query($con,"SELECT * FROM pedido WHERE IdPedido='$id_pedido' ");
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
      }else{
        echo "<script>alert('Por favor registre el N° de factura')</script>";
      }
    }


  }
  
?>