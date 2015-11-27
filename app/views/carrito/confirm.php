    <script>
        $('.pagarahora').hide(); 
        $(function(){

            document.getElementById('laconfirmacion').style.display='none';
            document.getElementById('sincarrito').style.display='block';

            var cart = JSON.parse($.cookie('cart'));


            if(cart.data.precio>0){ 
            
                document.getElementById('laconfirmacion').style.display='block';
                document.getElementById('sincarrito').style.display='none';

                $('ul#my-order').hide();        
        
                $.each(cart.data.items, function(key, value) {
                    $('tbody#confirm-cart').append('<tr><td>' + value.producto + '</td> <td> 5 días hábiles </td> <td> S/.' + value.precio + '.00</td><td>' + value.cantidad + '</td> <td> S/.' + value.precio + '.00</td> <td> <a class="remove" data-index=' + value.index + ' href="#"><img src="/imagenes/elim.png" class"eliminar"></a> </td></tr>');
                }); 
                $('tbody#confirm-cart').append('<tr><td colspan="6"><div class="total"> Total a Pagar :&nbsp;&nbsp;&nbsp;<strong> S/. ' + cart.data.precio + '</strong></div></td></tr>');
         
                $('input#cart').val($.cookie('cart'));
            }
            else{
                
                document.getElementById('laconfirmacion').style.display='none';
                document.getElementById('sincarrito').style.display='block';
            }       
        });

    </script>

    <div class="container clearfix" id="laconfirmacion">
    
        <div class="sixteen columns"> 
            <h1 class="page-title">Confirma tu pedido<span class="line"></span></h1>
        </div> 
         

        <div class="col-md-9 col-sm-12 col-xs-12 confirmespacio">

            <ol id="progressbar">
                <li class="point col1b col1a active" value="2">Elije tus productos</li>
                <li class="point col1b col1a active" value="3">Confirma tu Compra</li>
                <li class="point col1b col1a" value="4">Datos Personales</li>
                <li class="point col1b col1a" value="5">Pagar</li>
            </ol>

            <div class="linea"> </div>

            <div class="panel-body">
                <div class="panel panel-default">
                    <table class="mitabla">
                        <thead class="tablap">
                            <tr>
                                <th>Producto</th>
                                <th>Tiempo de entrega</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                                <th>Anular</th>
                            </tr>
                        </thead>
                        <tbody id="confirm-cart">
                        </tbody>
                    </table>
                    </br></br>
                     <div class="col-md-8 col-xs-12 col-xs-12">
                        <div class="col-md-6 col-sm-4 col-xs-7">
                            <?php 
                                  echo Form::open(array('url' => '/','method' => 'get')); 
                                  echo Form::submit('Seguir comprando', array('class' => 'btn btn-primary btn-lg btn-block',)); 
                                  echo Form::close(); 

                            ?>
                        </div>
                        <div class="col-md-6 col-sm-4 col-xs-5">
                            <?php 
                                  echo Form::open(array('url' => '/carrito/datos','method' => 'get')); 
                                  echo Form::submit('Pagar ahora', array('class' => 'btn btn-primary2 btn-lg btn-block',)); 
                                  echo Form::close(); 
                            ?>
                        </div> 
                    </div>
                    </br></br></br>
                </div>
            </div>

           
               
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="services clearfix">
                <div class="three columns">
                  <div class="item">
                    <div class=""><img src="/imagenes/envio.png" alt="" /></div>
                    <h3>Plazos de envío </h3>
                  </div>
                </div>

                <div class="three columns">
                  <div class="item">
                    <div class=""><img src="/imagenes/garantia.png" alt="" /></div>
                    <h3>Garantía</h3>
                  </div>
                </div>
                <div class="three columns">
                  <div class="item">
                    <div class=""><img src="/imagenes/ahorro.png" alt="" /></div>
                    <h3>Descuentos</h3>
                  </div>
                </div>

                <div class="three columns">
                  <div class="item">
                    <div class=""><img src="/imagenes/seguridad.png" alt="" /></div>
                    <h3>Seguridad</h3>
                  </div>
                </div>
            </div>


        </div>
        </br></br></br></br>    
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