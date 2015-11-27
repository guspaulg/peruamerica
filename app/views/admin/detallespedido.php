<script type="text/javascript">

    function mostrar2(){
        document.getElementById('anadircomentario').style.display='block';
        document.getElementById('enviarcomentario').style.display='none';
    }

    function mostrar(){
        document.getElementById('anadircomentario').style.display='none';
        document.getElementById('enviarcomentario').style.display='block';
    }

</script>


<div class="container clearfix">

    <div class="panel2 col-md-12 col-sm-12 col-xs-12">
        <a href="/admin/pedidos">Volver al menu principal</a>
        <p class="tpanel">Información del cliente<span class="line"></span></p>
        <p> <span class="misdatos2"> Nombres </span>  <span class="misdatosp"> <?php echo $usuario->nombres?> </span></p>
        <p> <span class="misdatos2"> Apellido Materno </span>  <span class="misdatosp"> <?php echo $usuario->appaterno?> </span></p>
        <p> <span class="misdatos2"> Apellido Paterno  </span>  <span class="misdatosp"> <?php echo $usuario->apmaterno?> </span></p>
        <p> <span class="misdatos2"> Correo Electrónico </span>  <span class="misdatosp"> <?php echo $usuario->email;?> </span></p>


      <?php if($usuario->ruc=='') {?> 
        <p> <span class="misdatos2"> D.N.I. </span> <span class="misdatosp"><?php echo $usuario->dni?> </span></p>
      <?php 
      }else{?>
        <p> <span class="misdatos2"> R.U.C. </span> <span class="misdatosp"><?php echo $usuario->ruc; ?> </span></p>
        <p> <span class="misdatos2"> Razón Social </span> <span class="misdatosp"><?php echo $usuario->razonsocial;?> </span></p>
        <p> <span class="misdatos2"> Dirección Fiscal </span> <span class="misdatosp"><?php echo $usuario->direccionfiscal;?> </span></p>
      <?php }?>

      <p> <span class="misdatos2"> Teléfono Celular </span> <span class="misdatosp"><?php echo $usuario->telefono1 ?> </span></p>
      <p> <span class="misdatos2"> Telefono alternativo </span>  <span class="misdatosp"> <?php echo $usuario->telefono2 ?> </span></p>
        
      <p><span class="misdatos2"> Tipo de direccion: </span><span class="misdatosp"><?php echo $usuario->tipodireccion; ?> </span></p>
      <p><span class="misdatos2"> Direccion: </span><span class="misdatosp"><?php echo $usuario->direccion; ?> </span></p>
      <p><span class="misdatos2"> Referencias : </span><span class="misdatosp"><?php echo $usuario->referencia; ?> </span></p>

        
        <p class="tpanel">Información del pedido<span class="line"></span></p>

        <p><span class="misdatos2"> Codigo del Pedido :</span><span class="codigop"> <?php echo $elpedido->codigo; ?> </span></p>
        <p><span class="misdatos2"> Producto :</span><span class="misdatosp"> <?php echo $elpedido->producto; ?> </span></p>
        <p><span class="misdatos2"> Cantidad : </span><span class="misdatosp"><?php echo $elpedido->cantidad; ?> </span></p>
        <p><span class="misdatos2"> Costo: </span><span class="misdatosp">S/. <?php echo $elpedido->precio; ?> </span></p>
        <p><span class="misdatos2"> Fecha: </span><span class="misdatosp">S/. <?php echo $elpedido->created_at; ?> </span></p>
        <p><span class="misdatos2"> Detalles : </span><span class="misdatosp"><?php echo $elpedido->detalles; ?> </span></p>
        <p><span class="misdatos2"> observaciones: </span><span class="misdatosp"><?php echo $elpedido->observaciones; ?> </span></p>

        <p class="tpanel"> Diseño<span class="line"></span></p>


    


























<?php 

$form='si';

if($elpedido->img3 != '') {
    
    $form='no';

    if ( ($elpedido->estado==4)||($elpedido->estado==5)||($elpedido->estado==6)||($elpedido->estado==7) ) { 

        ?> <div class="disenoface"> <?php

            if($elpedido->estado==4)
              { ?> <div class="felicitaciones"> El Cliente acepto el ultimo diseño.</div><?php } 
            if($elpedido->estado==5)
              { ?> <div class="felicitaciones"> Este pedido ya esta en imprenta.</div><?php }
            if($elpedido->estado==6)
              { ?> <div class="felicitaciones"> Este pedido ya se imprimo y esta en camino al cliente.</div><?php }
            if($elpedido->estado==7)
              { ?> <div class="felicitaciones"> Este pedido ya esta entregaoo</div><?php }

            ?> </br> <p class="titulodiseno"> cambiar el estado actual del pedido </p> </br> <?php

            echo Form::open(array('url' => '/admin/detalles' , 'method' => 'post')); ?>
            <div class="form-group">
                <?php
                echo Form::select('estado', array(
                  '3' => 'comento el diseño recibido y espera uno nuevo',
                  '4'=> 'Diseño aceptado y esperando para ser impreso',
                  '5'=> 'producto en  imprenta',
                  '6'=> 'producto impreso y en camino al cliente',
                  '7'=> 'Productos entregados'),null, array('class' => 'form-control2'));
                ?>                   
            </div>
            <?php
            echo Form::hidden('indi',2) ;
            echo Form::hidden('idpedido',$elpedido->id) ;
            echo Form::hidden('idcliente',$elpedido->idcliente) ;
            echo Form::submit('cambiar estado del producto', array('class' => 'btnbuscar btn btn-primary btn-lg btn-block')); 
            echo Form::close();?>
        </div> <?php
        
    }?>

    <div class="disenoface">
            
        <p class="titulodiseno"> tercer diseño propuesto </p>
        <img src="<?php echo $elpedido->img3 ?>">

        </br></br></br>
        <?php
        if ( ($elpedido->estado==1)||($elpedido->estado==2)||($elpedido->estado==3) ){ 
              $htmlErrors = HTML::ul($errors->all());
              if(!empty($htmlErrors))
              { ?>
                  <div class="alert alert-dismissable alert-warning">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <?php echo $htmlErrors; ?>
                  </div>
                  <?php
              }        
              echo Form::open(array('url' => '/admin/detalles','method' => 'post','files'=>true)); 
              echo Form::hidden('idpedido',$elpedido->id) ;
              echo Form::hidden('idcliente',$elpedido->idcliente) ;
              echo Form::hidden('num',3) ;
              echo Form::hidden('indi',1) ;
              echo Form::file('img'); ?> </br> <?php

              echo Form::submit('Cambiar diseño actual', array('class' => 'subir btn btn-primary btn-lg btn-block'));
              echo Form::close(); 
              
        }
        
        if($comentarios!= null) {
          foreach($comentarios as $comentario){
            if($comentario->num_img == 3) {
              ?> <div class="comentarios"><?php echo $comentario->comentario; ?> </div> <?php
            }
          }
        }?>
    </div>
<?php  }?>





































<?php 

if($elpedido->img2 != '') {
  
    if($form =='si'){ 

        $form='no';

        if ( ($elpedido->estado==1)||($elpedido->estado==2)||($elpedido->estado==3) ) { 
        ?>    
            <div class="disenoface">
                <p class="titulodiseno"> Agregar un nuevo diseño </p>
                <?php
                
                $htmlErrors = HTML::ul($errors->all());
                if(!empty($htmlErrors))
                { ?>
                    <div class="alert alert-dismissable alert-warning">
                        <button data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $htmlErrors; ?>
                    </div>
                    <?php
                }         
                echo Form::open(array('url' => '/admin/detalles','method' => 'post','files'=>true)); 
                echo Form::hidden('idpedido',$elpedido->id) ;
                echo Form::hidden('idcliente',$elpedido->idcliente) ;
                echo Form::hidden('indi',1) ;
                echo Form::hidden('num',3) ;
                echo Form::file('img'); ?> </br> <?php
                echo Form::submit('Enviar diseño al cliente', array('class' => 'subir btn btn-primary btn-lg btn-block'));
                echo Form::close(); 
              ?>
          </div>

        <?php 
        }else { ?>

            <div class="disenoface"> <?php

                if($elpedido->estado==4)
                  { ?> <div class="felicitaciones"> El Cliente acepto el ultimo diseño.</div><?php } 
                if($elpedido->estado==5)
                  { ?> <div class="felicitaciones"> Este pedido ya esta en imprenta.</div><?php }
                if($elpedido->estado==6)
                  { ?> <div class="felicitaciones"> Este pedido ya se imprimo y esta en camino al cliente.</div><?php }
                if($elpedido->estado==7)
                  { ?> <div class="felicitaciones"> Este pedido ya esta entregaoo</div><?php }

                ?> </br> <p class="titulodiseno"> cambiar el estado actual del pedido </p> </br> <?php

                echo Form::open(array('url' => '/admin/detalles' , 'method' => 'post')); ?>
                <div class="form-group">
                    <?php
                    echo Form::select('estado', array(
                      '3' => 'comento el diseño recibido y espera uno nuevo',
                      '4'=> 'Diseño aceptado y esperando para ser impreso',
                      '5'=> 'producto en  imprenta',
                      '6'=> 'producto impreso y en camino al cliente',
                      '7'=> 'Productos entregados'),null, array('class' => 'form-control2'));
                    ?>                   
                </div>
                <?php
                echo Form::hidden('indi',2) ;
                echo Form::hidden('idpedido',$elpedido->id) ;
                echo Form::hidden('idcliente',$elpedido->idcliente) ;
                echo Form::submit('cambiar estado del producto', array('class' => 'btnbuscar btn btn-primary btn-lg btn-block')); 
                echo Form::close();?>
            </div> <?php
        }
    }?>

    <div class="disenoface">
            
        <p class="titulodiseno"> Segundo diseño propuesto </p>
        <img src="<?php echo $elpedido->img2 ?>">

        </br></br></br>
        <?php
        if ( ($elpedido->estado==1)||($elpedido->estado==2)||($elpedido->estado==3) ){ 
              $htmlErrors = HTML::ul($errors->all());
              if(!empty($htmlErrors))
              { ?>
                  <div class="alert alert-dismissable alert-warning">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <?php echo $htmlErrors; ?>
                  </div>
                  <?php
              }        
              echo Form::open(array('url' => '/admin/detalles','method' => 'post','files'=>true)); 
              echo Form::hidden('idpedido',$elpedido->id) ;
              echo Form::hidden('idcliente',$elpedido->idcliente) ;
              echo Form::hidden('num',2) ;
              echo Form::hidden('indi',1) ;
              echo Form::file('img'); ?> </br> <?php

              echo Form::submit('Cambiar diseño actual', array('class' => 'subir btn btn-primary btn-lg btn-block'));
              echo Form::close(); 
              
        }
        
        if($comentarios!= null) {
          foreach($comentarios as $comentario){
            if($comentario->num_img == 2) {
              ?> <div class="comentarios"><?php echo $comentario->comentario; ?> </div> <?php
            }
          }
        }?>
    </div>
<?php  }?>



























<?php 

if($elpedido->img != '') {
  
    if($form =='si'){ 

        $form='no';
        if ( ($elpedido->estado==1)||($elpedido->estado==2)||($elpedido->estado==3) ) { 
        ?>    
            <div class="disenoface">
                <p class="titulodiseno"> Agregar un nuevo diseño </p>
                <?php
                
                $htmlErrors = HTML::ul($errors->all());
                if(!empty($htmlErrors))
                { ?>
                    <div class="alert alert-dismissable alert-warning">
                        <button data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $htmlErrors; ?>
                    </div>
                    <?php
                }         

                echo Form::open(array('url' => '/admin/detalles','method' => 'post','files'=>true)); 
                echo Form::hidden('idpedido',$elpedido->id) ;
                echo Form::hidden('idcliente',$elpedido->idcliente) ;
                echo Form::hidden('indi',1) ;
                echo Form::hidden('num',2) ;
                echo Form::file('img'); ?> </br> <?php
                echo Form::submit('Enviar diseño al cliente', array('class' => 'subir btn btn-primary btn-lg btn-block'));
                echo Form::close(); 
              ?>
          </div>

        <?php 
        }else { ?>

            <div class="disenoface"> <?php

                if($elpedido->estado==4)
                  { ?> <div class="felicitaciones"> El Cliente acepto el ultimo diseño.</div><?php } 
                if($elpedido->estado==5)
                  { ?> <div class="felicitaciones"> Este pedido ya esta en imprenta.</div><?php }
                if($elpedido->estado==6)
                  { ?> <div class="felicitaciones"> Este pedido ya se imprimo y esta en camino al cliente.</div><?php }
                if($elpedido->estado==7)
                  { ?> <div class="felicitaciones"> Este pedido ya esta entregaoo</div><?php }

                ?> </br> <p class="titulodiseno"> cambiar el estado actual del pedido </p> </br> <?php

                echo Form::open(array('url' => '/admin/detalles' , 'method' => 'post')); ?>
                <div class="form-group">
                    <?php
                    echo Form::select('estado', array(
                      '3' => 'comento el diseño recibido y espera uno nuevo',
                      '4'=> 'Diseño aceptado y esperando para ser impreso',
                      '5'=> 'producto en  imprenta',
                      '6'=> 'producto impreso y en camino al cliente',
                      '7'=> 'Producto entregados',),null, array('class' => 'form-control2'));
                    ?>                   
                </div>
                <?php
                echo Form::hidden('indi',2) ;
                echo Form::hidden('idpedido',$elpedido->id) ;
                echo Form::hidden('idcliente',$elpedido->idcliente) ;
                echo Form::submit('cambiar estado del producto', array('class' => 'btnbuscar btn btn-primary btn-lg btn-block')); 
                echo Form::close();?>
            </div> <?php
        }
    }?>

    <div class="disenoface">
            
        <p class="titulodiseno"> Primer diseño propuesto </p>
        <img src="<?php echo $elpedido->img ?>">

        </br></br></br>
        <?php
        if ( ($elpedido->estado==1)||($elpedido->estado==2)||($elpedido->estado==3) ){ 
              $htmlErrors = HTML::ul($errors->all());
              if(!empty($htmlErrors))
              { ?>
                  <div class="alert alert-dismissable alert-warning">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <?php echo $htmlErrors; ?>
                  </div>
                  <?php
              }        

              echo Form::open(array('url' => '/admin/detalles','method' => 'post','files'=>true)); 
              echo Form::hidden('idpedido',$elpedido->id) ;
              echo Form::hidden('idcliente',$elpedido->idcliente) ;
              echo Form::hidden('num',1) ;
              echo Form::hidden('indi',1) ;
              echo Form::file('img'); ?> </br> <?php

              echo Form::submit('Cambiar diseño actual', array('class' => 'subir btn btn-primary btn-lg btn-block'));
              echo Form::close(); 
              
        }
        
        if($comentarios!= null) {
          foreach($comentarios as $comentario){
            if($comentario->num_img == 1) {
              ?> <div class="comentarios"><?php echo $comentario->comentario; ?> </div> <?php
            }
          }
        }?>
    </div>
<?php  }?>





















<?php
if($form =='si'){ ?>
    <div class="disenoface">
    <p class="titulodiseno"> Agregar un primer diseño </p>
    </br>
    <?php
    $htmlErrors = HTML::ul($errors->all());
    if(!empty($htmlErrors))
    { ?>
        <div class="alert alert-dismissable alert-warning">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $htmlErrors; ?>
        </div>
        <?php
    } ?> 

    <?php 
      $form='no';
      echo Form::open(array('url' => '/admin/detalles','method' => 'post','files'=>true)); 
      echo Form::hidden('idpedido',$elpedido->id) ;
      echo Form::hidden('idcliente',$elpedido->idcliente) ;
      echo Form::hidden('num',1) ;
      echo Form::hidden('indi',1) ;
      echo Form::file('img'); ?> </br> <?php

      echo Form::submit('Enviar diseño al cliente', array('class' => 'subir btn btn-primary btn-lg btn-block'));
      echo Form::close(); 
    ?>
    </div>
<?php  } ?>

    </div>

</div>
