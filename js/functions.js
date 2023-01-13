$(document).ready(function(){

    //--------------------- SELECCIONAR FOTO PRODUCTO ---------------------
    $("#foto").on("change",function(){
    	var uploadFoto = document.getElementById("foto").value;
        var foto       = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
        
            if(uploadFoto !='')
            {
                var type = foto[0].type;
                var name = foto[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';                        
                    $("#img").remove();
                    $(".delPhoto").addClass('notBlock');
                    $('#foto').val('');
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".prevPhoto").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    }
              }else{
              	alert("No selecciono foto");
                $("#img").remove();
              }              
    });

    $('.delPhoto').click(function(){
    	$('#foto').val('');
    	$(".delPhoto").addClass('notBlock');
    	$("#img").remove();

    });


    //Activa campos para registrar clientes
    $('.btn_new_cliente').click(function(e){
        e.preventDefault();
        $('#nom_cliente').removeAttr('disabled');
        $('#ape_cliente').removeAttr('disabled');
        $('#tel_cliente').removeAttr('disabled');
        $('#guardar').removeAttr('disabled');

        $('#div_registro_cliente').slideDown();
    });

    //buscar cliente
    $('#doc_cliente').keyup(function(e){
    e.preventDefault();

    var cl= $(this).val();
    var action='searchCliente';

        $.ajax({
            url:'ajax.php',
            type:"POST",
            async:true,
            data:{action:action,cliente:cl},


            success: function(response)
            {

                if (response==0) {
                    $('#idCliente').val('');
                    $('#nom_cliente').val('');
                    $('#ape_cliente').val('');
                    $('#tel_cliente').val('');

                    $('.btn_new_cliente').slideDown();
                }else{
                    var data=$.parseJSON(response);
                    $('#idCliente').val(data.IdPersona);
                    $('#nom_cliente').val(data.NombreP);
                    $('#ape_cliente').val(data.Apellido);
                    $('#tel_cliente').val(data.Telefono);

                    $('.btn_new_cliente').slideUp();

                    $('#nom_cliente').attr('disabled','disabled');
                    $('#ape_cliente').attr('disabled','disabled');
                    $('#tel_cliente').attr('disabled','disabled');

                    $('#div_registro_cliente').slideUp();
                }
            },
            error:function(error){
            }
        });
    });

    //buscar cliente fijo drow list
    $('#select_cliente').change(function(e){
    e.preventDefault();

    var cl= $(this).val();
    var action='searchCliente_fijo';

        $.ajax({
            url:'ajax.php',
            type:"POST",
            async:true,
            data:{action:action,cliente:cl},


            success: function(response)
            {

                if (response==0) {
                    $('#idCliente_fijo').val('');
                    $('#nom_cliente').val('');
                    $('#ape_cliente').val('');
                    $('#doc_cliente').val('');
                    $('#tel_cliente').val('');
                    $('#dir_cliente').val('');

                }else{
                    var data=$.parseJSON(response);
                    $('#idCliente_fijo').val(data.IdPersona);
                    $('#nom_cliente').val(data.NombreP);
                    $('#ape_cliente').val(data.Apellido);
                    $('#doc_cliente').val(data.Documento);
                    $('#tel_cliente').val(data.Telefono);
                    $('#dir_cliente').val(data.Direccion);


                    $('#nom_cliente').attr('disabled','disabled');
                    $('#ape_cliente').attr('disabled','disabled');
                    $('#doc_cliente').attr('disabled','disabled');
                    $('#tel_cliente').attr('disabled','disabled');
                    $('#dir_cliente').attr('disabled','disabled');

                }
            },
            error:function(error){
            }
        });
    });

    //buscar proveedor drow list
    $('#select_pro').change(function(e){
    e.preventDefault();

    var cl= $(this).val();
    var action='searchCliente_pro';

        $.ajax({
            url:'ajax.php',
            type:"POST",
            async:true,
            data:{action:action,cliente:cl},


            success: function(response)
            {

                if (response==0) {
                    $('#idCliente_pro').val('');

                }else{
                    var data=$.parseJSON(response);
                    $('#idCliente_pro').val(data.IdProveedor);


                }
            },
            error:function(error){
            }
        });
    });

    //buscar proveedor
    $('#nit_proveedor').keyup(function(e){
    e.preventDefault();

    var pr= $(this).val();
    var action='searchProveedor';

        $.ajax({
            url:'ajax.php',
            type:"POST",
            async:true,
            data:{action:action,proveedor:pr},


            success: function(response)
            {

                if (response==0) {
                    $('#idProveedor').val('');
                    $('#nom_proveedor').val('');
                    $('#dir_proveedor').val('');
                    $('#email_proveedor').val('');
                    $('#tel1_proveedor').val('');
                    $('#tel2_proveedor').val('');
                    $('#reg_proveedor').val('');

                }else{
                    var data=$.parseJSON(response);
                    $('#idProveedor').val(data.IdProveedor);
                    $('#nom_proveedor').val(data.Nombre);
                    $('#dir_proveedor').val(data.Direccion);
                    $('#email_proveedor').val(data.Email);
                    $('#tel1_proveedor').val(data.Telefono1);
                    $('#tel2_proveedor').val(data.Telefono2);
                    $('#reg_proveedor').val(data.Regimen);

                    $('#nom_proveedor').attr('disabled','disabled');
                    $('#dir_proveedor').attr('disabled','disabled');
                    $('#email_proveedor').attr('disabled','disabled');
                    $('#tel1_proveedor').attr('disabled','disabled');
                    $('#tel2_proveedor').attr('disabled','disabled');
                    $('#reg_proveedor').attr('disabled','disabled');

                }
            },
            error:function(error){
            }
        });
    });

    // crear cliente - ventas
    $('#form_new_cliente_venta').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax.php',
            type:"POST",
            async:true,
            data:$('#form_new_cliente_venta').serialize(),


            success: function(response)
            {
                if (response != 'error') {
                    var info=JSON.parse(response);
                    $('#idCliente').val(info.IdPersona);
                    $('#nom_cliente').attr('disabled','disabled');
                    $('#ape_cliente').attr('disabled','disabled');
                    $('#tel_cliente').attr('disabled','disabled');

                    $('.btn_new_cliente').slideUp();

                    $('#div_registro_cliente').slideUp();
                }
            },
            error:function(error){
            }
        });
    });

    //crear deuda a cliente
    $('#form_new_deuda').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax.php',
            type:"POST",
            async:true,
            data:$('#form_new_deuda').serialize(),


            success: function(response)
            {
                if (response != 'error') {
                    location.reload();
                }else{
                    console.log('no data');
                }
            },
            error:function(error){
            }
        });
    });

    //crear compra a cliente pendiente
    $('#form_new_compra_p').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax.php',
            type:"POST",
            async:true,
            data:$('#form_new_compra_p').serialize(),


            success: function(response)
            {
                if (response != 'error') {
                    location.reload();
                }else{
                    console.log('no data');
                }
            },
            error:function(error){
            }
        });
    });


    // buscar producto
    $('#select').change(function(e){
        e.preventDefault();

        var producto=$(this).val();
        var action = 'infoProducto';

        if(producto!=''){

            $.ajax({
                url:'ajax.php',
                type:"POST",
                async:true,
                data:{action:action,producto:producto},


                success: function(response)
                {
                    if (response!='error') {
                        var info=JSON.parse(response);
                        $('#txt_descripcion').val(info.Caracteristicas);
                        $('#txt_existencia').html(info.Existencias);
                        $('#txt_cant_producto').val('1');
                        $('#txt_precio').val(info.ValorUnitario);
                        $('#txt_precio_total').html(info.ValorUnitario);

                        $('#txt_cant_producto').removeAttr('disabled');
                        $('#txt_descripcion').removeAttr('disabled');
                        $('#txt_precio').removeAttr('disabled');

                        $('#add_product_venta').slideDown();
                    }else{
                        $('#txt_descripcion').val('');
                        $('#txt_existencia').html('-');
                        $('#txt_cant_producto').val('0');
                        $('#txt_precio').val('0.00');
                        $('#txt_precio_total').html('0.00');

                        $('#txt_cant_producto').attr('disabled','disabled');
                        $('#txt_descripcion').attr('disabled','disabled');
                        $('#txt_precio').attr('disabled','disabled');

                        $('#add_product_venta').slideUp();
                    }
                },
                error:function(error){
                }
            });
        }
    });


    // buscar producto venta fija
    $('#select').change(function(e){
        e.preventDefault();

        var producto=$(this).val();
        var action = 'infoProducto';

        if(producto!=''){

            $.ajax({
                url:'ajax.php',
                type:"POST",
                async:true,
                data:{action:action,producto:producto},


                success: function(response)
                {
                    if (response!='error') {
                        var info=JSON.parse(response);
                        $('#txt_descripcion').val(info.Caracteristicas);
                        $('#txt_existencia').html(info.Existencias);
                        $('#txt_cant_producto').val('1');
                        $('#txt_precio').html(info.ValorUnitario);
                        $('#txt_precio_total').html(info.ValorUnitario);

                        $('#txt_cant_producto').removeAttr('disabled');
                        $('#txt_descripcion').removeAttr('disabled');

                        $('#add_product_venta').slideDown();
                    }else{
                        $('#txt_descripcion').val('');
                        $('#txt_existencia').html('-');
                        $('#txt_cant_producto').val('0');
                        $('#txt_precio').html('0.00');
                        $('#txt_precio_total').html('0.00');

                        $('#txt_cant_producto').attr('disabled','disabled');
                        $('#txt_descripcion').attr('disabled','disabled');

                        $('#add_product_venta').slideUp();
                    }
                },
                error:function(error){
                }
            });
        }
    });

    //calcular valor total

    $('#txt_cant_producto').keyup(function(e){
        e.preventDefault();
        var precio_total=$(this).val()*$('#txt_precio').val();
        var existencia=parseInt($('#txt_existencia').html());
        $('#txt_precio_total').html(precio_total);

        if (($(this).val()<1 || isNaN($(this).val())) || ($(this).val() > existencia) ) {
            $('#add_product_venta').slideUp();
        }else{
            $('#add_product_venta').slideDown();
        }
    });

    //calcular valor total venta fija

    $('#txt_cant_producto').keyup(function(e){
        e.preventDefault();
        var precio_total=$(this).val()*$('#txt_precio').html();
        var existencia=parseInt($('#txt_existencia').html());
        $('#txt_precio_total').html(precio_total);

        if (($(this).val()<1 || isNaN($(this).val())) || ($(this).val() > existencia) ) {
            $('#add_product_venta').slideUp();
        }else{
            $('#add_product_venta').slideDown();
        }
    });

    //calcular valor total venta externa
    $('#txt_precio').keyup(function(e){
        e.preventDefault();
        var precio_total=$(this).val()*$('#txt_cant_producto').val();
        var existencia=parseInt($('#txt_existencia').html());
        $('#txt_precio_total').html(precio_total);

    });

    //Agregar producto al detalle
    $('#add_product_venta').click(function(e){
        e.preventDefault();
        if ($('#txt_cant_producto').val() > 0) {
            var codproducto=$('#select').val();
            var cantidad=$('#txt_cant_producto').val();
            var descripcion=$('#txt_descripcion').val();
            var precio=$('#txt_precio').val();
            var action='addProductoDetalle';

            $.ajax({
                url:'ajax.php',
                type:"POST",
                async:true,
                data:{action:action,producto:codproducto,cantidad:cantidad,descripcion:descripcion,precio:precio},


                success: function(response)
                {
                    if (response != 'error') {
                        var info = JSON.parse(response);
                        $('#detalle_venta').html(info.detalle);
                        $('#detalle_totales').html(info.totales);

                        $('#select').val('');
                        $('#txt_descripcion').val('');
                        $('#txt_existencia').html('-');
                        $('#txt_cant_producto').val('0');
                        $('#txt_precio').val('0.00');
                        $('#txt_precio_total').html('0.00');

                        $('#txt_cant_producto').attr('disabled','disabled');
                        $('#txt_descripcion').attr('disabled','disabled');
                        $('#txt_precio').attr('disabled','disabled');

                        $('#add_product_venta').slideUp();

                    }else{
                        console.log('no data');
                    }
                    viewProcesar();
                },
                error:function(error){
                }
            });
        }
    });

    //boton agregar productos al pedido

    $('#txt_valor_uni_pedido').keyup(function(e){
        e.preventDefault();
        var precio_total=$(this).val()*$('#txt_cant_pedido').val();
        $('#txt_precio_total').html(precio_total);

        if (($(this).val()<1 || isNaN($(this).val()))) {
            $('#add_product_pedido').slideUp();
        }else{
            $('#add_product_pedido').slideDown();
        }
    });

    //Agregar producto al detallepedido = PEDIDO
    $('#form_new_detalle_pedido').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax.php',
            type:"POST",
            async:true,
            data:$('#form_new_detalle_pedido').serialize(),


            success: function(response)
            {
                if (response != 'error') {
                        var info = JSON.parse(response);
                        $('#detalle_venta_pedido').html(info.detalle);
                        $('#detalle_totales_pedido').html(info.totales);

                        $('#txt_art_pedido').val('');
                        $('#txt_uni_med_pedido').val('');
                        $('#txt_cant_pedido').val('1');
                        $('#txt_valor_uni_pedido').val('');
                        $('#txt_precio_total').html('0.00');

                    }else{
                        console.log('no data');
                    }
                    viewProcesar2();
                },
                error:function(error){
            }
        });
    });


    //Anular venta
    $('#btn_anular_venta').click(function(e){
        e.preventDefault();

        var rows =$('#detalle_venta tr').length;
        if (rows>0) {
            var action ='anularVenta';

            $.ajax({
                url:'ajax.php',
                type:"POST",
                async:true,
                data:{action:action},


                success: function(response)
                {
                    if (response != 'error') {
                        location.reload();
                    }
                },
                error:function(error){
                }
            });
        }
    });

    //Anular pedido==PEDIDO
    $('#btn_anular_pedido').click(function(e){
        e.preventDefault();

        var rows =$('#detalle_venta_pedido tr').length;
        if (rows>0) {
            var action ='anularPedido';

            $.ajax({
                url:'ajax.php',
                type:"POST",
                async:true,
                data:{action:action},


                success: function(response)
                {
                    if (response != 'error') {
                        location.reload();
                    }
                },
                error:function(error){
                }
            });
        }
    });

    //Facturar venta
    $('#btn_facturar_venta').click(function(e){
        e.preventDefault(); 

        var rows =$('#detalle_venta tr').length;
        if (rows>0) {
            var action ='procesarVenta';
            var codcliente=$('#idCliente').val();

            $.ajax({
                url:'ajax.php',
                type:"POST",
                async:true,
                data:{action:action,codcliente:codcliente},


                success: function(response)
                {
                    if (response != 'error') {
                        location.reload();
                    }else{
                        console.log('no data');
                    }
                },
                error:function(error){
                }
            });
        }
    });

    //Facturar venta clientes fijos
    $('#btn_facturar_venta').click(function(e){
        e.preventDefault(); 

        var rows =$('#detalle_venta tr').length;
        if (rows>0) {
            var action ='procesarVenta_fijo';
            var codcliente=$('#idCliente_fijo').val();

            $.ajax({
                url:'ajax.php',
                type:"POST",
                async:true,
                data:{action:action,codcliente:codcliente},


                success: function(response)
                {
                    if (response != 'error') {
                        location.reload();
                    }else{
                        console.log('no data');
                    }
                },
                error:function(error){
                }
            });
        }
    });
    //Facturar pedido==PEDIDO
    $('#btn_facturar_pedido').click(function(e){
        e.preventDefault(); 

        var rows =$('#detalle_venta_pedido tr').length;
        if (rows>0) {
            var action ='procesarPedido';
            var codcliente=$('#idProveedor').val();
            var nofac=$('#nofac').val();
            var deuda=$('#deu_pen').val();

            $.ajax({
                url:'ajax.php',
                type:"POST",
                async:true,
                data:{action:action,codcliente:codcliente,nofac:nofac,deuda:deuda},


                success: function(response)
                {
                    if (response != 'error') {
                        location.reload();
                    }else{
                        console.log('no data');
                    }
                },
                error:function(error){
                }
            });
        }
    });


});

function del_product_detalle(Correlativo){
    var action='delProductoDetalle';
    var id_detalle=Correlativo;

    $.ajax({
        url:'ajax.php',
        type:"POST",
        async:true,
        data:{action:action,id_detalle:id_detalle},


        success: function(response)
        {
            if (response!='error') {
                var info=JSON.parse(response);

                $('#detalle_venta').html(info.detalle);
                $('#detalle_totales').html(info.totales);

                $('#select').val('');
                $('#txt_descripcion').html('-');
                $('#txt_existencia').html('-');
                $('#txt_cant_producto').val('0');
                $('#txt_precio').html('0.00');
                $('#txt_precio_total').html('0.00');

                $('#txt_cant_producto').attr('disabled','disabled');

                $('#add_product_venta').slideUp();

            }else{
                $('#detalle_venta').html('');
                $('#detalle_totales').html('');
            }
            viewProcesar();
        },
        error:function(error){
        }
    });
}

//eliminar detallepedido==PEDIDO

function del_product_detalle_pedido(Correlativo1){
    var action='delProductoDetallePedido';
    var id_detalle=Correlativo1;

    $.ajax({
        url:'ajax.php',
        type:"POST",
        async:true,
        data:{action:action,id_detalle:id_detalle},


        success: function(response)
        {
            if (response!='error') {
                var info=JSON.parse(response);

                $('#detalle_venta_pedido').html(info.detalle);
                $('#detalle_totales_pedido').html(info.totales);

                $('#txt_art_pedido').val('');
                $('#txt_uni_med_pedido').val('');
                $('#txt_cant_pedido').val('');
                $('#txt_valor_uni_pedido').val('');
                $('#txt_precio_total').html('0.00');

            }else{
                $('#detalle_venta_pedido').html('');
                $('#detalle_totales_pedido').html('');
            }
            viewProcesar2();
        },
        error:function(error){
        }
    });
}

//mostrar/ocultar boton procesar
function viewProcesar(){
    if ($('#detalle_venta tr').length>0) {
        $('#btn_facturar_venta').show();
    }else{
        $('#btn_facturar_venta').hide();
    }
}

//mostrar/ocultar boton procesar pedido
function viewProcesar2(){
    if ($('#detalle_venta_pedido tr').length>0) {
        $('#btn_facturar_pedido').show();
    }else{
        $('#btn_facturar_pedido').hide();
    }
}

function serchForDetalle(id){
    var action='serchForDetalle';
    var user=id;

    $.ajax({
        url:'ajax.php',
        type:"POST",
        async:true,
        data:{action:action,user:user},


        success: function(response)
        {
            if (response != 'error') {
                var info = JSON.parse(response);
                $('#detalle_venta').html(info.detalle);
                $('#detalle_totales').html(info.totales);


            }else{
                console.log('no data');
            }
            viewProcesar();
        },
        error:function(error){
        }
    });

}
//listar al recargar pagina las detallepedido==PEDIDO
function serchForDetallePedido(id){
    var action='serchForDetallePedido';
    var user=id;

    $.ajax({
        url:'ajax.php',
        type:"POST",
        async:true,
        data:{action:action,user:user},


        success: function(response)
        {
            if (response != 'error') {
                var info = JSON.parse(response);
                $('#detalle_venta_pedido').html(info.detalle);
                $('#detalle_totales_pedido').html(info.totales);


            }else{
                console.log('no data');
            }
            viewProcesar2();
        },
        error:function(error){
        }
    });

}