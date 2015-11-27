 <script>
    $('.pagarahora').hide(); 
</script>




<div class="container clearfix">    
    <?php
    if(isset($message))
    { ?>   
        <div class="col-md-12 panel-default">
            <div class="mensaje">

            <div style="width:60%">
                              
                <p class="listo1">¡ MUCHAS GRACIAS POR CONFIAR EN PERUAMERICA !</p>
                <p class="listo2">Hemos recibido tu Pedido</p>
                <p class="listo3"> Estimad@ <?php echo $message['nombre'] ?>, el monto a pagar es <span class="listo4" > S/. <?php echo $message['costo'] ?>.00</span></p> 
                <div class="mensaje-espacio">
                <p class="listo5"> Procedimiento para pagar:</p> 
                <ul class="ulmensaje">
                    <li class="limensaje"> <span class="num"> 1) </span> Agentes BCP o Ventanilla: Indica muestro número de cuenta y el monto a pagar.</li>
                    <li class="limensaje"> <span class="num"> 2) </span> Envianos un correo a clientes@peruamerica.com con el voucher escaneado de tu pago</li>
                    <li class="limensaje"> <span class="num"> 3) </span>Te llamarémos para confirmar datos de tu pedido.</li>
                </ul>
                <p class="listo5"> Cuenta : 897654327898765434</p>
                <p class="listo6"> </br> Recuerda que tienes 48 horas para hacer tu pago o tu pedido se cancelará 
                automáticamente. Esta confirmación también ha sido enviada a tu correo electrónico.
                Puedes imprimir esta página para llevarla y mostrarla al momento de realizar tu pago.</p> 
                </div>
            </div>
            </div>
        </div>
        <script>
            $(function(){
                $('ul#my-order').hide();  
                $.removeCookie('cart', { path: '/' });      
            });
        </script>
    <?php
    }
    else{
          
      }  ?>      

</div>    
            
             
    
