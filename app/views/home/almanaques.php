

<div class="container gallery clearfix">
  
   <div class="sixteen columns">
      <h1 class="page-title">Almanaques y Calendarios<span class="line"></span></h1>  </br></br>
   </div><!-- Page Title -->
 

   <!-- Start Project Details -->
   <div class="seven columns  bottom">
     
      <div class="row">          
        <div class="col-md-12"> 
          <div class="well bs-component">

              
              <?php 
              if($vista>1) {  
              ?>  
              <div class="div-antes-comprar">

                  <div style="width:50% ;float:left; margin-left:10%;"> 
                      <P class="resumen">Costo Final:</P>
                      <div class="costos"> S/. <?php echo $costo;?></div>
                      <p class="costo2"> 
                        <strong>Incluido:</strong></br> 
                        I.G.V. y Gastos de envio </br>
                        Dscto: 15 %</br>
                        Precio Normal <strong> S/. <?php $costoant=$costo*1.15; echo $costoant ?></strong></br>
                        Precio Final<strong> S/. <?php echo $costo; ?></strong></br>

                      </P>
                  </div>

                  <div class="caja"> 
                      <img src="/imagenes/caja.png" style="margin: 0 auto;">
                  </div>

              </div>    

              <div class="div-comprar">
                   <?php 
                      echo Form::open(array('url' => '/carrito/confirm','method' => 'get')); 
                      $detalles='Tipo de almanaque : '.$modelo.' ; Cantidad : 1 millar ; Diseño : '.$diseno2;
                      echo Form::submit('Comprar ahora', array(
                          'class' => 'comprar btn-primary btn-lg btn-block',
                          'data-precio' => $costo,
                          'data-cantidad' => '1 millar',
                          'data-detalles' => $detalles, 
                          'data-codigo' => $codigo,  
                          'data-producto' => $producto,
                          'data-observaciones' => $observaciones,)); 
                      echo Form::close(); 
                    ?>
              </div>

              <?php
                }else{
                  $modelo='50x35';
                  $diseno='1';
                  $observaciones='';
                }
              ?>

              <div class="titulo-param">Elige tus Parametros </div>
              <?php 
              echo Form::open(array('url' => '/almanaques' , 'method' => 'post')); 
              ?>
             


              <div class="form-group">
                  <?php
                  echo Form::label('modelo', 'Modelo de Almanaque', array('class' => 'pregunta')); 
                  ?>
                  <div id="popup">
                    <a>
                      <img src="/imagenes/info.png">
                      <span> <div class="titulo-selec"> Modelo</div>El Banner delgado y grueso es ideal para avisos en paneles y se 
                      en todos los tamaños.</br></br>El material de vinil es adhesivo y solo se imprime hasta 1.50 metros de ancho.</span>
                    </a>
                  </div>
                  <?php
                  echo Form::select('modelo', array('50x35' => 'Almanaques publicitarios cartulina plastificada a fullcolor tamaño 50cm x 35cm',
                   '50x70' => 'Almanaques publicitarios en cartulina plastificada a fullcolor tamaño 50cm x 70cm',
                   '100x70' => 'Almanaques publicitarios en cartulina plastificada a full color tamaño 100cm x 70cm',
                   'escritorio' => 'Calendarios publicitarios de escritorio','bolsillo'=>'Calendarios de bolsillo'), $modelo ,array('class' => 'form-control2'));
                  ?>
              </div>

              <div class="form-group">
                  <?php
                  echo Form::label('cantidad', 'Cantidad', array('class' => 'pregunta')); 
                  ?>
                  <div id="popup">
                    <a>
                      <img src="/imagenes/info.png">
                      <span> <div class="titulo-selec"> Cantidad</div>Selecciona la cantidad.</span>
                    </a>
                  </div>
                  <?php
                  echo Form::select('cantidad', array('1' => '1 millar',),null,array('class' => 'form-control2'));
                  ?>
              </div>

             

              <div class="form-group">
                  <?php
                  echo Form::label('diseno', '¿Tienes tu propio diseño?', array('class' => 'pregunta')); 
                  ?>
                  <div id="popup">
                    <a>
                      <img src="/imagenes/info.png">
                      <span> <div class="titulo-selec"> Diseño</div> Nosotros tenemos diseñadores Profesionales a tu disposicion, no 
                      tiene costo el diseño en Peruamerica.
                      </span>
                    </a>
                  </div>
                  <?php
                  echo Form::select('diseno', array('1' => 'No, quiero que Peruamerica me proponga un diseño', 
                      '2' => 'si, tengo un diseño',), $diseno, array('class' => 'form-control2'));
                  ?>
              </div>

               <div class="form-group">
                  <?php
                  echo Form::label('diseno', 'Cuentanos mas detalles', array('class' => 'pregunta')); 
                  ?>
                  <div id="popup">
                    <a>
                      <img src="/imagenes/info.png">
                      <span> <div class="titulo-selec"> Detalles </div>Ayúdanos con más información sobre el contenido de tu Calendario o Almanaque, por 
                      ejemplo: Dirección, Números de teléfono, rubro del negocio, estilo del diseño esperado, etc.
                      </span>
                    </a>
                  </div>
                  <?php
                  echo Form::textarea('observaciones',$observaciones, array('class' => 'form-control2'));
                  ?>
              </div>
              <?php
              echo Form::submit('¡Calcular presupuesto!', array('class' => 'calcular btn btn-primary btn-lg btn-block')); 
              echo Form::close(); ?>


                                
          </div>  
        </div>
      </div>
   </div>

      <!-- ++++++++++++++++++ columna tres +++++++++++++++++++++++++++ -->
           <div class="nine columns top bottom">

             <div class="espacio-2 col-md-12 col-sm-12">
               
                  <div id="bigPic">
                    <img src="/imagenes/almanaques/almanaque1.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    <img src="/imagenes/almanaques/almanaque2.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    <img src="/imagenes/almanaques/almanaque3.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    <img src="/imagenes/almanaques/almanaque4.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    <img src="/imagenes/almanaques/almanaque5.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    
                  </div>
                  
                  <ul id="thumbs">
                    <li class=" " rel="1"><img src="/imagenes/almanaques/almanaque-1.jpg" alt=""></li>
                    <li class=" " rel="2 "><img src="/imagenes/almanaques/almanaque-2.jpg" alt=""></li>
                    <li rel="3" class=" "><img src="/imagenes/almanaques/almanaque-3.jpg" alt=""></li>
                    <li rel="4" class=" "><img src="/imagenes/almanaques/almanaque-4.jpg" alt=""></li>
                    <li rel="5" class=" "><img src="/imagenes/almanaques/almanaque-5.jpg" alt=""></li>
                  
                  </ul>
                  

             </div><!-- End slider-project -->  

             <h2 class="title top-2 bottom-2">Consigue los calendarios personalizados 2016 más baratos gracias a nuestras ofertas, rebajas y descuentos especiales:<span class="line"></span></h2>
               
               <div class="about-project bottom">
                 <p>
                  Solo <strong>Peruamerica</strong> es capaz de ofrecer un servicio óptimo al<strong> Precio Justo</strong>. 
                  Podras optar por enviarnos tu propio diseño o hacer uso de los servicios de nuestros diseñadores gráficos 
                  para lograr un diseño profesional acorde a tus necesidades.</p>
               </div>
               
                <ul class="square-list job bottom-2">
                  <li class="mili"> Calendario con la foto que quieras en la parte superior y troquelado para ir desglosando mes a mes.</li>
                  <li class="mili"> Calendarios Corporativos ideales para tu marca o negocio.</li>
                  <li class="mili"> <strong>Calendarios de mesa :</strong> rectangulares, cuadrados, cubilete de lápices, etc. </li>
                  <li class="mili"> <strong>Calendarios de bolsillo </strong> personalizados por ambas caras.</li>
                  <li class="mili"> <strong>Calendarios de pared</strong> personalizados con la foto que quieras mes a mes más portada. </li>
                </ul><!-- End square-list -->



           </div>
   <!-- ++++++++++++++++++ final columna tres +++++++++++++++++++++++++++ -->


</div><!-- <<< End Container >>> -->
  
      
<script type="text/javascript">
  var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < $('#bigPic img').length){
          var indexImage = $('#bigPic img')[index]
            if(currentImage){   
              if(currentImage != indexImage ){
                    $(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    $(currentImage).fadeOut(250, function() {
              myTimer = setTimeout("showNext()", 3000);
              $(this).css({'display':'none','z-index':1})
          });
                }
            }
            $(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
            $('#thumbs li').removeClass('active');
            $($('#thumbs li')[index]).addClass('active');
        }
    }
    
    function showNext(){
        var len = $('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }
    
    var myTimer;
    
    $(document).ready(function() {
      myTimer = setTimeout("showNext()", 3000);
    showNext(); //loads first image
        $('#thumbs li').bind('click',function(e){
          var count = $(this).attr('rel');
          showImage(parseInt(count)-1);
        });
  });
    


  </script> 