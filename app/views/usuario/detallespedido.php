


<script type="text/javascript">

    function mostrar2(){
        document.getElementById('anadiryaceptar').style.display='block';
        document.getElementById('enviarcomentario').style.display='none';
    }

    function mostrar(){
        document.getElementById('anadiryaceptar').style.display='none';
        document.getElementById('enviarcomentario').style.display='block';
    }

</script>





<div class="container clearfix">


    <div class="panel col-md-3 col-sm-4 col-xs-12">
        <div style="text-align:center;">
            <img src="/imagenes/usuario.png">
        </div></br></br>

        <div class="micuenta">MI CUENTA</div>

        <div class="apanel"><a href="/micuenta">Panel de la Cuenta</a></div>

        <div class="apanel"><a href="misd">Editar mi información</a></div>

        <div class="apanel"><a href="misd">Dirección de envío</a></div>

        <div class="apanel"><a href="/mispedidos">Mis Pedidos</a></div>

        <div class="apanel"><a href="misd">Consultas</a></div>
    </div>

    <div class="panel2 col-md-8 col-sm-7 col-xs-12  col-md-offset-1 col-sm-offset-1">
        
        <p class="tpanel"> Mi orden<span class="line"></span></p>

        <p><span class="misdatos2"> Codigo del Pedido :</span><span class="codigop"> <?php echo $elpedido->codigo; ?> </span></p>
        <p><span class="misdatos2"> Producto :</span><span class="misdatosp"> <?php echo $elpedido->producto; ?> </span></p>
        <p><span class="misdatos2"> Cantidad : </span><span class="misdatosp"><?php echo $elpedido->cantidad; ?> </span></p>
        <p><span class="misdatos2"> Costo: </span><span class="misdatosp">S/. <?php echo $elpedido->precio; ?> </span></p>
        <p><span class="misdatos2"> Fecha: </span><span class="misdatosp"> <?php echo $elpedido->created_at; ?> </span></p>
        <p><span class="misdatos2"> Detalles : </span><span class="misdatosp"><?php echo $elpedido->detalles; ?> </span></p>
        <p><span class="misdatos2"> Observaciones: </span><span class="misdatosp"><?php echo $elpedido->observaciones; ?> </span></p>


        <p class="tpanel"> Diseño<span class="line"></span></p>

        
        <?php 
        $coment = 'si';
        if($elpedido->img3 != '') {

            $coment = 'no';?>

            <div class="disenoface">

                <p class="titulodiseno"> Propuesta de diseño </p>

                <img src="<?php echo $elpedido->img3 ?>"width="510" 
                onmouseover="showtrail(736,436,'<?php echo $elpedido->img3 ?>');" onmouseout="hidetrail();" />
                
                <?php
                
                if ( ($elpedido->estado==1)||($elpedido->estado==2)||($elpedido->estado==3) ) { ?>

                    <div id="anadiryaceptar">
                        <div class="anadircomentario" onclick="mostrar()">
                          Añadir observaciones
                        </div>
                        
                        <?php 
                            echo Form::open(array('url' => '/mispedidos/detalles','method' => 'post')); 
                            echo Form::hidden('indi', 2);
                            echo Form::hidden('id_cliente', $elpedido->idcliente);
                            echo Form::hidden('idpedido',$elpedido->id);
                            echo Form::submit('Aceptar Diseño', array('class' => 'btn btn-primary4 btn-lg btn-block')); 
                            echo Form::close(); 
                        ?>
                    </div>

                    <div id="enviarcomentario">
                    <?php 
                        echo Form::open(array('url' => '/mispedidos/detalles','method' => 'post')); 
                        echo Form::hidden('num_img', 3);
                        echo Form::hidden('indi', 1);
                        echo Form::hidden('id_cliente', $elpedido->idcliente);
                        echo Form::hidden('idpedido',$elpedido->id);
                        echo Form::textarea('comentario',$value = null, array('class' => 'comentario','placeholder' => '... puedes agregar todas las observaciones que desees, un diseñador asignado modificará el diseño actual y agregara en este panel otra propuesta en las próximas horas ...' ));
                        ?>
                        <div style="width: 100%;">
                        <div class="cancelo" onclick="mostrar2()">Cancelar</div>
                        <?php echo Form::submit('Enviar observaciones al diseñador', array('class' => 'btn btn-primary3 btn-lg btn-block')); ?>
                        
                        </div>
                        <?php
                        echo Form::close(); 
                    ?>
                    </div>

                
                
                <?php } else if ($elpedido->estado==4){ ?>
                <div class="felicitaciones"> <strong>¡Felicitaciones! </strong> ya tienes un diseño y en las proximas horas estaremos impriendo tu pedido.</div>
                
                <?php }else if ($elpedido->estado==5){  ?>
                <div class="felicitaciones"> <strong>¡Adivina! </strong> tu pedido esta siendo impreso en estos momentos.</div>

                <?php }else if ($elpedido->estado==6){  ?>
                <div class="felicitaciones"> <strong>¡Estamos en camino! </strong> tu pedido esta siendo trasladado a tu domicilio.</div>

                 <?php }else if ($elpedido->estado==7){  ?>
                <div class="felicitaciones"> <strong>¡Gracias por la confianza! </strong> este pedido ya fue entregado.</div>

                <?php } ?>


                <?php 

                if($comentarios!= null) {
                  foreach($comentarios as $comentario){
                    if($comentario->num_img == 3) {
                      ?> <div class="comentarios"><?php echo $comentario->comentario; ?> </div> <?php
                    }
                  }

                }?>
            </div>
        <?php }?>

        

        <?php if($elpedido->img2 != '') { ?>

            <div class="disenoface">

                <p class="titulodiseno"> Propuesta de diseño </p>
                <img src="<?php echo $elpedido->img2 ?>"width="510" 
                onmouseover="showtrail(736,436,'<?php echo $elpedido->img2 ?>');" onmouseout="hidetrail();" />
                

                <?php if($coment=='si'){ 

                        $coment ='no';
                        ?>

                        <?php
                
                        if ( ($elpedido->estado==1)||($elpedido->estado==2)||($elpedido->estado==3) ) { ?>
                        
                            <div id="anadiryaceptar">
                                <div class="anadircomentario" onclick="mostrar()">
                                  Añadir observaciones
                                </div>
                                <?php 
                                    echo Form::open(array('url' => '/mispedidos/detalles','method' => 'post')); 
                                    echo Form::hidden('indi', 2);
                                    echo Form::hidden('id_cliente', $elpedido->idcliente);
                                    echo Form::hidden('idpedido',$elpedido->id);
                                    echo Form::submit('Aceptar Diseño', array('class' => 'btn btn-primary4 btn-lg btn-block')); 
                                    echo Form::close(); 
                                ?>
                            </div>

                            <div id="enviarcomentario">
                            <?php 
                                echo Form::open(array('url' => '/mispedidos/detalles','method' => 'post')); 
                                echo Form::hidden('num_img', 2);
                                echo Form::hidden('indi', 1);
                                echo Form::hidden('id_cliente', $elpedido->idcliente);
                                echo Form::hidden('idpedido',$elpedido->id);
                                echo Form::textarea('comentario',$value = null, array('class' => 'comentario','placeholder' => '... puedes agregar todas las observaciones que desees, un diseñador asignado modificará el diseño actual y agregara en este panel otra propuesta en las próximas horas ...' ));
                                ?>
                                <div style="width: 100%;">
                                <div class="cancelo" onclick="mostrar2()">Cancelar</div>
                                <?php echo Form::submit('Enviar observaciones al diseñador', array('class' => 'btn btn-primary3 btn-lg btn-block')); ?>
                                
                                </div>
                                <?php
                                echo Form::close(); ?>
                            </div>
                        <?php } else if ($elpedido->estado==4){ ?>
                        <div class="felicitaciones"> <strong>¡Felicitaciones! </strong> ya tienes un diseño y en las proximas horas estaremos impriendo tu pedido.</div>
                        
                        <?php }else if ($elpedido->estado==5){  ?>
                        <div class="felicitaciones"> <strong>¡Adivina! </strong> tu pedido esta siendo impreso en estos momentos.</div>

                        <?php }else if ($elpedido->estado==6){  ?>
                        <div class="felicitaciones"> <strong>¡Estamos en camino! </strong> tu pedido esta siendo trasladado a tu domicilio.</div>

                         <?php }else if ($elpedido->estado==7){  ?>
                        <div class="felicitaciones"> <strong>¡Gracias por la confianza! </strong> este pedido ya fue entregado.</div>

                        <?php } 
                } ?>
                <?php 

                if($comentarios!= null) {
                  foreach($comentarios as $comentario){
                    if($comentario->num_img == 2) {
                      ?> <div class="comentarios"><?php echo $comentario->comentario; ?> </div> <?php
                    }
                  }

                } ?>
            </div>
        <?php }?>


        <?php if($elpedido->img != '') {?>
            
            <div class="disenoface">
                
                <p class="titulodiseno"> Propuesta de diseño </p>
                 <img src="<?php echo $elpedido->img ?>"width="510" 
                onmouseover="showtrail(736,436,'<?php echo $elpedido->img ?>');" onmouseout="hidetrail();" />
                

                <?php if($coment=='si'){ 

                        $coment ='no';
                        ?>
                        <?php
                
                        if ( ($elpedido->estado==1)||($elpedido->estado==2)||($elpedido->estado==3) ) { ?>

                            <div id="anadiryaceptar">
                                <div class="anadircomentario" onclick="mostrar()">
                                  Añadir observaciones
                                </div>
                                <?php 
                                    echo Form::open(array('url' => '/mispedidos/detalles','method' => 'post')); 
                                    echo Form::hidden('indi', 2);
                                    echo Form::hidden('id_cliente', $elpedido->idcliente);
                                    echo Form::hidden('idpedido',$elpedido->id);
                                    echo Form::submit('Aceptar Diseño', array('class' => 'btn btn-primary4 btn-lg btn-block')); 
                                    echo Form::close(); 
                                ?>
                            </div>

                            <div id="enviarcomentario">
                            <?php 
                                echo Form::open(array('url' => '/mispedidos/detalles','method' => 'post')); 
                                echo Form::hidden('num_img', 1);
                                echo Form::hidden('indi', 1);
                                echo Form::hidden('id_cliente', $elpedido->idcliente);
                                echo Form::hidden('idpedido',$elpedido->id);
                                echo Form::textarea('comentario',$value = null, array('class' => 'comentario','placeholder' => '... puedes agregar todas las observaciones que desees, un diseñador asignado modificará el diseño actual y agregara en este panel otra propuesta en las próximas horas ...' ));
                                ?>
                                <div style="width: 100%;">
                                <div class="cancelo" onclick="mostrar2()">Cancelar</div>
                                <?php echo Form::submit('Enviar observaciones al diseñador', array('class' => 'btn btn-primary3 btn-lg btn-block')); ?>
                                
                                </div>
                                <?php
                                echo Form::close(); ?>
                            </div>
                        <?php } else if ($elpedido->estado==4){ ?>
                        <div class="felicitaciones"> <strong>¡Felicitaciones! </strong> ya tienes un diseño y en las proximas horas estaremos impriendo tu pedido.</div>
                        
                        <?php }else if ($elpedido->estado==5){  ?>
                        <div class="felicitaciones"> <strong>¡Adivina! </strong> tu pedido esta siendo impreso en estos momentos.</div>

                        <?php }else if ($elpedido->estado==6){  ?>
                        <div class="felicitaciones"> <strong>¡Estamos en camino! </strong> tu pedido esta siendo trasladado a tu domicilio.</div>

                         <?php }else if ($elpedido->estado==7){  ?>
                        <div class="felicitaciones"> <strong>¡Gracias por la confianza! </strong> este pedido ya fue entregado.</div>

                        <?php } 
                } ?>
                
                <?php 

                if($comentarios!= null) {
                  foreach($comentarios as $comentario){
                    if($comentario->num_img == 1) {
                      ?> <div class="comentarios"><?php echo $comentario->comentario; ?> </div> <?php
                    }
                  }

                }?>
            </div>    
        <?php }?>
        
       
    </div>


</div>
