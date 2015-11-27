<div class="container clearfix">


  <div class="panel col-md-12 col-sm-12 col-xs-12">

    <div class="col-md-5 col-sm-6 col-xs-12">

         <div class="buscar">Pedidos Online</div>
          <?php 
          echo Form::open(array('url' => '/admin/pedidos' , 'method' => 'post')); 
          ?>
          <div class="form-group">
              <?php
              echo Form::select('estado', array('1' => 'pedidos recien comprados y esperando diseño',
                '2' => 'recibio diseño y se espera confirmacion de usuario', 
                '3' => 'comento el diseño recibido y espera uno nuevo',
                '4'=> 'Diseño aceptado y esperando para ser impreso',
                '5'=> 'producto en  imprenta',
                '6'=> 'producto impreso y en camino al cliente',
                '7'=> 'Productos entregados',
                '8'=>'todos'),null, array('class' => 'form-control2'));
              ?>                   
          </div>
          <?php
          echo Form::hidden('indi',1) ;
          echo Form::submit('Buscar', array('class' => 'btnbuscar btn btn-primary btn-lg btn-block')); 
          echo Form::close(); ?>
          </br>
    </div>
    
    <div class="col-md-5 col-sm-6 col-xs-12">

          <div class="buscar">Buscar Pedido</div>
          <?php 
          echo Form::open(array('url' => '/admin/pedidos' , 'method' => 'post')); 
          ?>
          <div class="form-group">
              <?php
              echo Form::label('codigo-', 'Codigo :',array('class' => 'col-sm-3 control-label'));
               ?>
              <div class="col-sm-7">
              <?php 
              echo Form::text('codigo', $value = null, array( 'class' => 'form-control')); 
              ?>
              </div>
          </div></br></br></br>
          <div class="form-group">
              <?php
              echo Form::label('dni-', 'D.N.I.:',array('class' => 'col-sm-3 control-label'));
               ?>
              <div class="col-sm-7">
              <?php 
              echo Form::text('dni', $value = null, array( 'class' => 'form-control')); 
              ?>
              </div>
          </div></br></br>
          <div class="form-group">
              <?php
              echo Form::label('ruc-', 'R.U.C. : ',array('class' => 'col-sm-3 control-label'));
               ?>
              <div class="col-sm-7">
              <?php 
              echo Form::text('ruc', $value = null, array( 'class' => 'form-control')); 
              ?>
              </div>
          </div>
          </br></br>
          <?php
          echo Form::hidden('indi',2) ;
          echo Form::submit('Buscar', array('class' => 'calcular btn btn-primary btn-lg btn-block')); 
          echo Form::close(); ?>
        
    </div>
  </div>

    <div class="panel2 col-md-12 col-sm-12 col-xs-12  ">
        
       

        <table class="">

            <thead>

                <tr>
                  <th>Codigo de compra</th>
                  <th>Fecha de Compra</th>
                  <th>Detalles del Pedido</th>
                  <th> Costo</th>
                  <th> </th>

                </tr>
            </thead>

            <tbody>
                <?php
                foreach($pedidos as $pedido)
                { ?>
                    <tr>

                        <td><?php echo $pedido->codigo; ?></td>
                    
                        <td> <?php echo $pedido->created_at; ?></td>

                        <td> <?php echo $pedido->producto ?> </td>

                        <td> S/. <?php echo $pedido->precio?> </td>

                        <td>

                        <?php 
                          echo Form::open(array('url' => '/admin/detalles','method' => 'get')); 
                          echo Form::hidden('idpedido', $pedido->id);
                          echo Form::hidden('idcliente', $pedido->idcliente);
                          echo Form::submit('', array('class' => 'lupa',)); 
                          echo Form::close(); 
                        ?>
                        </td>

                    </tr>

                <?php 
                } ?>
            </tbody>
        </table>
    </div>


</div>

