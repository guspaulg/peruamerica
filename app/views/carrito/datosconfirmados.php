<script type="text/javascript">

    $('.pagarahora').hide(); 

    $(function(){

    document.getElementById('losdatos').style.display='none';
    document.getElementById('sincarrito').style.display='block';

    var cart = JSON.parse($.cookie('cart'));

    if(cart.data.precio>0){ 

        $('input#cart').val($.cookie('cart'));  

        $('.subtotal').append('S/. ' + cart.data.precio + '</b></td></tr>'); 
        $('.subtotal3').append('S/. ' + cart.data.precio + '</b></td></tr>');    

        document.getElementById('losdatos').style.display='block';
        document.getElementById('sincarrito').style.display='none'; 
    }
    else{
        document.getElementById('laconfirmacion').style.display='none';
        document.getElementById('sincarrito').style.display='block';
    }

    });

</script>


<div class="container clearfix" id="losdatos">
    
    </br></br></br></br>
    <ol id="progressbar">
        <li class="point col1b col1a active" value="2">Elije tus productos</li>
        <li class="point col1b col1a active" value="3">Confirma tu Compra</li>
        <li class="point col1b col1a active" value="4">Datos Personales</li>
        <li class="point col1b col1a" value="5">Pagar</li>
    </ol>
    <div class="linea"> </div>
    </br></br>

     <div class="col-md-5">
            <div class="yaestoy">
                <div class="datos2"> Tus datos personales </div>
                	<div class="recuadro">
                	<p class="misdatos"> Nombre &nbsp;&nbsp;:&nbsp;&nbsp; 
                	<span class="misdatosp"> <?php echo $usuario1->appaterno.' '.$usuario1->apmaterno.' '.$usuario1->nombres?> </span></p>
                	
                	<?php if($usuario1->ruc=='') {?>	
                		<p class="misdatos"> D.N.I. &nbsp;&nbsp;:&nbsp;&nbsp; <span class="misdatosp"><?php echo $usuario1->dni?> </span></p>
                	<?php 
                	}else{?>
                		<p class="misdatos">R.U.C. &nbsp;&nbsp;: &nbsp;&nbsp;<span class="misdatosp"><?php echo $usuario1->dni?> </span></p>
                		<p class="misdatos"> Razón Social &nbsp;&nbsp;:&nbsp;&nbsp; <span class="misdatosp"><?php echo $usuario1->dni?> </span></p>
                		<p class="misdatos"> Dirección Fiscal &nbsp;&nbsp;:&nbsp;&nbsp; <span class="misdatosp"><?php echo $usuario1->dni?> </span></p>
                	<?php }?>
                	<p class="misdatos"> Teléfono Celular &nbsp;&nbsp;:&nbsp;&nbsp; <span class="misdatosp"><?php echo $usuario1->telefono1 ?> </span></p>
                	<p class="misdatos"> Telefono alternativo &nbsp;&nbsp;:&nbsp;&nbsp; <span class="misdatosp"> <?php echo $usuario1->telefono2 ?> </span></p>
					<p class="misdatos"> Tipo de dirección &nbsp;&nbsp;:&nbsp;&nbsp; <span class="misdatosp"> <?php echo $usuario1->tipodireccion ?></span> </p>
                	<p class="misdatos"> Dirección &nbsp;&nbsp;:&nbsp;&nbsp; </p>
                	<p class="misdatosp"> <?php echo $usuario1->direccion ?> </p>

                	<p class="misdatos"> Referencias &nbsp;&nbsp;:&nbsp;&nbsp; 	<span class="misdatosp"><?php echo $usuario1->referencia?> </span></p>

                    
                    </div>
                </div>
                
            </div>


            <div class="col-md-4">

                <div class="registrate">
                    <div class="datos2">Confirmación de pedido </div>

                    <div class="recuadro">
                        <p class="res"> Resumen de pedido</p>

                        <p class="res2">Sub total &nbsp;&nbsp; <span class="subtotal"></span></p>
                        <hr class="punteado">
                        <p class="res2">Gastos de envío &nbsp;&nbsp;  <span class="subtotal2"> S/. 00.00</span></p>
                        <hr class="punteado">
                        <p class="res2">Total &nbsp;&nbsp; <span class="subtotal3"></span></p>
                        </br>

                        <?php
                            echo Form::open(array('url' => 'carrito/datosconfirmados' ,'method' => 'post', 'class'=>'form-horizontal', 'name' => 'formulario')); 

                            echo Form::hidden('cart', null, array('id' => 'cart'));
                            
                            echo Form::submit('Finalizar compra', array('class' => 'btn btn-primary2 btn-lg btn-block finalizarcompra')); 
                    
                            echo Form::close(); 
                        ?>  
                        </br>
                        <p class="terminos">Al hacer click en "Finalizar compra" acepto los Términos de Uso y Condiciones de Entrega,
                         el Acuerdo de Privacidad, y la Política de Garantía y Devoluciones.</p>
                         </br>
                    </div>
                  
                </div>

            </div> 

</div>

<div id="sincarrito">

    <div class="container clearfix">
        <div class="carrito-vacio col-md-offset-3 col-md-6">
            <img src="imagenes/carrito-vacio.png">
            <p class="sin1"> Tu carrito esta vacío, te invitamos a comprar alguno de nuestros servicios de imprenta. </p> </BR>
            <a href="/tarjetas"> TARJETAS PERSONALES </a> | <a href="/gigantografias"> GIGANTOGRAFIAS</a>
            | <a href="/almanaques"> ALMANAQUES</a> | <a href="/volantes"> VOLANTES</a>
        </div>
    </div>

</div>