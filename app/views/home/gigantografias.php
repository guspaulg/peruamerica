
<div class="container gallery clearfix">
  
   <div class="sixteen columns">
      <h1 class="page-title">Gigantografias <span class="line"></span></h1>  </br></br>
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
                      $detalles='Tipo de material : '.$material2.' ; Ancho : '.$ancho.' mts ; Largo : '.$largo.' mts ; Orientacion : '.$orientacion.' ; Diseño : '.$diseno2;
                      echo Form::submit('Comprar ahora', array(
                          'class' => 'comprar btn-primary btn-lg btn-block',
                          'data-precio' => $costo,
                          'data-cantidad' => 1,
                          'data-detalles' => $detalles, 
                          'data-codigo' => $codigo,  
                          'data-producto' => $producto,
                          'data-observaciones' => $observaciones,)); 
                      echo Form::close(); 
                    ?>
              </div>

              <?php
                }else{
                  $material='banner-delgado';
                  $ancho=1.50;
                  $largo=1.50;
                  $orientacion='vertical';
                  $diseno='1';
                  $observaciones='';
                }
              ?>

              <div class="titulo-param">Elige tus Parametros </div>
              <?php 
              echo Form::open(array('url' => '/gigantografias' , 'method' => 'post')); 
              ?>
             


              <div class="form-group">
                  <?php
                  echo Form::label('material', 'Tipo de material', array('class' => 'pregunta')); 
                  ?>
                  <div id="popup">
                    <a>
                      <img src="/imagenes/info.png">
                      <span> <div class="titulo-selec"> Material</div>El Banner delgado y grueso es ideal para avisos en paneles y se 
                      en todos los tamaños.</br></br>El material de vinil es adhesivo y solo se imprime hasta 1.50 metros de ancho.</span>
                    </a>
                  </div>
                  <?php
                  echo Form::select('material', array('bdelgado' => 'Banner delgado', 'bgrueso' => 'Banner grueso',
                   'vmate' => 'Vinil mate','vbrillante' => 'Vinil brillante'), $material ,array('class' => 'form-control2'));
                  ?>
              </div>

              <div class="form-group">
                  <?php
                  echo Form::label('papel', 'Orientación', array('class' => 'pregunta')); 
                  ?>
                  <div id="popup">
                    <a>
                      <img src="/imagenes/info.png">
                      <span> <div class="titulo-selec"> Orientacion</div>Selecciona si el diseño tendra la orientación vertical u horizontal.</span>
                    </a>
                  </div>
                  <?php
                  echo Form::select('orientacion', array('vertical' => 'Vertical', 'Horizontal' => 'Horizontal'),$orientacion,array('class' => 'form-control2'));
                  ?>
              </div>

              <div class="form-group">
                  <?php
                  echo Form::label('cantos', 'Ancho (metros)', array('class' => 'pregunta')); 
                  ?>
                  <div id="popup">
                    <a>
                      <img src="/imagenes/info.png">
                      <span> <div class="titulo-selec"> Ancho </div>Elije el ancho de tu Gigantografia, el número que ingreses por defecto estará en nuestro sistema de 
                      medidas que es el metro.</span>
                    </a>
                  </div>
                  <?php
                  echo Form::text('ancho', $ancho, array('class' => 'form-control2'));
                  ?>
              </div>

              <div class="form-group">
                  <?php
                  echo Form::label('cantos', 'Largo (metros)', array('class' => 'pregunta')); 
                  ?>
                  <div id="popup">
                    <a>
                      <img src="/imagenes/info.png">
                      <span> <div class="titulo-selec"> Ancho</div>Elije el Largo de tu Gigantografia,  el número que ingreses por defecto estará en nuestro sistema de 
                      medidas que es el metro.</span>
                    </a>
                  </div>
                  <?php
                  echo Form::text('largo', $largo, array('class' => 'form-control2'));
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
                      <span> <div class="titulo-selec"> Detalles </div>Ayúdanos con más información sobre el contenido de tu Gigantografia, por 
                      ejemplo: Dirección, Números de teléfono, rubro del negocio, precios, estilo del diseño esperado, etc.
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
                    <img src="/imagenes/gigantografias/gig1.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    <img src="/imagenes/gigantografias/gig2.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    <img src="/imagenes/gigantografias/gig3.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    <img src="/imagenes/gigantografias/gig4.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    <img src="/imagenes/gigantografias/gig5.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                    
                  </div>
                  
                  <ul id="thumbs">
                    <li class=" " rel="1"><img src="/imagenes/gigantografias/gig-1.jpg" alt=""></li>
                    <li class=" " rel="2 "><img src="/imagenes/gigantografias/gig-2.jpg" alt=""></li>
                    <li rel="3" class=" "><img src="/imagenes/gigantografias/gig-3.jpg" alt=""></li>
                    <li rel="4" class=" "><img src="/imagenes/gigantografias/gig-4.jpg" alt=""></li>
                    <li rel="5" class=" "><img src="/imagenes/gigantografias/gig-5.jpg" alt=""></li>
                  
                  </ul>
                  

             </div><!-- End slider-project -->  

             <h2 class="title top-2 bottom-2">Detalles del servicio :<span class="line"></span></h2>
               
               <div class="about-project bottom">
                 <p>
                  Solo <strong>Peruamerica</strong> es capaz de ofrecer un servicio óptimo al<strong> Precio Justo</strong>. 
                  Podras optar por enviarnos tu propio diseño o hacer uso de los servicios de nuestros diseñadores gráficos 
                  para lograr un diseño profesional acorde a tus necesidades.</p>
               </div>
               
              
               
               <h2 class="title bottom-2">Nuestro servicio incluye :<span class="line"></span></h2>
               
                <ul class="square-list job bottom-2">
                  <li class="mili"> Gigantografias en Alta Resolución de 1440 dpi </li>
                  <li class="mili">Impresión con Garantía y Calidad.</li>
                  <li class="mili"> Diseño Personalizado. </li>
                  <li class="mili"> Reparto a domicilio GRATIS. </li>
                  <li class="mili"> Asistencia online y telefónica permanente para nuestros clientes. </li>
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