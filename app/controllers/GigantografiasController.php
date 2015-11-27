<?php

class GigantografiasController extends BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth', array('except' => 'mostrar'));            
        $this->beforeFilter(function(){            
            Auth::check() ? $this->layout = 'layout.plantillausuario' : $this->layout = 'layout.plantilla'; 
        });
    }

	public function mostrar()
    {   

        if(Auth::check())
        {       

            if (Request::isMethod('get'))
            {            
                $vista=1;
                $email = Auth::user()->email;
                $usuario = DB::table('datosusuarios')->where('email', $email)->first();
                $this->layout->usuario = $usuario;   
        		$this->layout->content = View::make('home.gigantografias', array('vista' => $vista));
            }        
            else if (Request::isMethod('post'))
            {
        	  	$vista=2;
                $producto='Gigantografia';
        	  	$largo=Input::get('largo');
                $ancho=Input::get('ancho');
                $orientacion=Input::get('orientacion');
                $material=Input::get('material');
                $diseno=Input::get('diseno');
                $observaciones=Input::get('observaciones');

                // aqui calculare el precio del producto

                $costo = DB::table('gigantografias')->where('tipo', $material)->pluck('precio');

                $costo= $costo*$largo*$ancho;

                // -------------------------------------

        	  	if($diseno==1){ $diseno2 = 'Diseño solicitado';}
        	  	if($diseno==2){ $diseno2= 'Diseño no solicitado';}

                if($material=='bdelgado'){ $material2 = 'Banner delgado';}
                if($material=='bgrueso'){ $material2= 'Banner grueso';}
                if($material=='vmate'){ $material2 = 'Vinil mate';}
                if($material=='vbrillante'){ $material2= 'Vinil brillante';}

                $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $su = strlen($an) - 1;
                $codigo= substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1) .substr($an, rand(0, $su), 1)
                .substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1);

                $email = Auth::user()->email;
                $usuario = DB::table('datosusuarios')->where('email', $email)->first();
                $this->layout->usuario=$usuario;  

    	    	$this->layout->content = View::make('home.gigantografias', array('producto'=>$producto,'largo'=>$largo,'ancho'=>$ancho,
    	    	'material'=>$material,'material2'=>$material2, 'diseno2' => $diseno2,'diseno' => $diseno, 
                'costo'=>$costo, 'observaciones'=>$observaciones,'vista' => $vista,'orientacion'=>$orientacion,'codigo'=> $codigo ));
    	    }
        }
        else
        {
            if (Request::isMethod('get'))
            {            
                $vista=1; 
                $this->layout->content = View::make('home.gigantografias', array('vista' => $vista));
            }        
            else if (Request::isMethod('post'))
            {
                $vista=2;
                $producto='Gigantografia';
                $largo=Input::get('largo');
                $ancho=Input::get('ancho');
                $orientacion=Input::get('orientacion');
                $material=Input::get('material');
                $diseno=Input::get('diseno');
                $observaciones=Input::get('observaciones');

                // aqui calculare el precio del producto

                $costo = DB::table('gigantografias')->where('tipo', $material)->pluck('precio');

                $costo= $costo*$largo*$ancho;

                // -------------------------------------

                if($diseno==1){ $diseno2 = 'Diseño solicitado';}
                if($diseno==2){ $diseno2= 'Diseño no solicitado';}

                if($material=='bdelgado'){ $material2 = 'Banner delgado';}
                if($material=='bgrueso'){ $material2= 'Banner grueso';}
                if($material=='vmate'){ $material2 = 'Vinil mate';}
                if($material=='vbrillante'){ $material2= 'Vinil brillante';}

                $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $su = strlen($an) - 1;
                $codigo= substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1) .substr($an, rand(0, $su), 1)
                .substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1);

                $this->layout->content = View::make('home.gigantografias', array('producto'=>$producto,'largo'=>$largo,'ancho'=>$ancho,
                'material'=>$material,'material2'=>$material2, 'diseno2' => $diseno2,'diseno' => $diseno, 
                'costo'=>$costo, 'observaciones'=>$observaciones,'vista' => $vista,'orientacion'=>$orientacion,'codigo'=> $codigo ));

            }

        } 
    }

}