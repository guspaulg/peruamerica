<?php

class AlmanaquesController extends BaseController {

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
        		$this->layout->content = View::make('home.almanaques', array('vista' => $vista));
            }        
            else if (Request::isMethod('post'))
            {
        	  	$vista=2;
                $producto='Almanaque';
                $modelo=Input::get('modelo');
                $diseno=Input::get('diseno');
                $observaciones=Input::get('observaciones');

                // aqui calculare el precio del producto

                $costo = DB::table('almanaques')->where('tipo', $modelo)->pluck('precio');


                // -------------------------------------

        	  	if($diseno==1){ $diseno2 = 'Diseño solicitado';}
        	  	if($diseno==2){ $diseno2= 'Diseño no solicitado';}

                if($modelo=='50x35'){ $modelo2 = 'Almanaques publicitarios cartulina plastificada a fullcolor tamaño 50cm x 35cm';}
                if($modelo=='50x70'){ $modelo2= 'Almanaques publicitarios en cartulina plastificada a fullcolor tamaño 50cm x 70cm';}
                if($modelo=='100x70'){ $modelo2 = 'Almanaques publicitarios en cartulina plastificada a full color tamaño 100cm x 70cm';}
                if($modelo=='escritorio'){ $modelo2= 'Calendarios publicitarios de escritorio';}
                if($modelo=='bolsillo'){ $modelo2= 'Calendarios de bolsillo';}

                $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $su = strlen($an) - 1;
                $codigo= substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1) .substr($an, rand(0, $su), 1)
                .substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1);

                $email = Auth::user()->email;
                $usuario = DB::table('datosusuarios')->where('email', $email)->first();
                $this->layout->usuario=$usuario;  

    	    	$this->layout->content = View::make('home.almanaques', array('producto'=>$producto,
    	    	'modelo'=>$modelo,'modelo2'=>$modelo2, 'diseno2' => $diseno2,'diseno' => $diseno, 
                'costo'=>$costo, 'observaciones'=>$observaciones,'vista' => $vista,'codigo'=> $codigo ));
    	    }
        }
        else
        {
            if (Request::isMethod('get'))
            {            
                $vista=1; 
                $this->layout->content = View::make('home.almanaques', array('vista' => $vista));
            }        
            else if (Request::isMethod('post'))
            {
               $vista=2;
                $producto='Almanaque';
                $modelo=Input::get('modelo');
                $diseno=Input::get('diseno');
                $observaciones=Input::get('observaciones');

                // aqui calculare el precio del producto

                $costo = DB::table('almanaques')->where('tipo', $modelo)->pluck('precio');


                // -------------------------------------

                if($diseno==1){ $diseno2 = 'Diseño solicitado';}
                if($diseno==2){ $diseno2= 'Diseño no solicitado';}

                if($modelo=='50x35'){ $modelo2 = 'Almanaques publicitarios cartulina plastificada a fullcolor tamaño 50cm x 35cm';}
                if($modelo=='50x70'){ $modelo2= 'Almanaques publicitarios en cartulina plastificada a fullcolor tamaño 50cm x 70cm';}
                if($modelo=='100x70'){ $modelo2 = 'Almanaques publicitarios en cartulina plastificada a full color tamaño 100cm x 70cm';}
                if($modelo=='escritorio'){ $modelo2= 'Calendarios publicitarios de escritorio';}
                if($modelo=='bolsillo'){ $modelo2= 'Calendarios de bolsillo';}

                $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $su = strlen($an) - 1;
                $codigo= substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1) .substr($an, rand(0, $su), 1)
                .substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1);


                $this->layout->content = View::make('home.almanaques', array('producto'=>$producto,
                'modelo'=>$modelo,'modelo2'=>$modelo2, 'diseno2' => $diseno2,'diseno' => $diseno, 
                'costo'=>$costo, 'observaciones'=>$observaciones,'vista' => $vista,'codigo'=> $codigo ));

            }

        } 
    }

}