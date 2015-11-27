<?php

class MispedidosdetallesController extends BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth', array('except' => 'ver'));            
        $this->beforeFilter(function(){            
            Auth::check() ? $this->layout = 'layout.plantillausuario' : $this->layout = 'layout.plantilla'; 
        });
    }

    public function ver()
    {    
        if(Auth::check())
        {   
            $email = Auth::user()->email;
            $usuario = DB::table('datosusuarios')->where('email', $email)->first();
            $this->layout->usuario=$usuario;
            $idpedido = Input::get('idpedido');
            $elpedido = DB::table('datosventas')->where('id', $idpedido)->first();
            $comentarios = DB::table('comentarios')->where('id_pedido', $idpedido)->where('id_cliente', Auth::user()->id)->orderBy('id', 'desc')->get();            

            if (Request::isMethod('get')){

                if($elpedido==null){
                    $pedidos = DB::table('datosventas')->where('idcliente', Auth::user()->id)->get();
                    $this->layout->content = View::make('usuario.pedidos', array('usuario'=>$usuario,
                    'pedidos'=>$pedidos)); 
                }else{

                    $this->layout->content = View::make('usuario.detallespedido', array(
                    'usuario'=>$usuario,'elpedido'=>$elpedido,'comentarios'=>$comentarios)); 
                }

            } else if (Request::isMethod('post')){

                $indi=Input::get('indi');

                if($indi==1){
                    
                    $comentario = new Comentario;
                    $comentario->id_cliente =Input::get('id_cliente');
                    $comentario->id_pedido =Input::get('idpedido');
                    $comentario->num_img =Input::get('num_img');
                    $comentario->comentario =Input::get('comentario');
                    $comentario->save();

                    $pedido = Datosventa::find(Input::get('idpedido'));
                    $pedido->estado=3;
                    $pedido->save();
                }
                if ($indi==2) {
                    
                    $pedido = Datosventa::find(Input::get('idpedido'));
                    $pedido->estado=4;
                    $pedido->save();
                }
                
                $comentarios = DB::table('comentarios')->where('id_pedido', $idpedido)->where('id_cliente', Auth::user()->id)->orderBy('id', 'desc')->get();            
                $elpedido = DB::table('datosventas')->where('id', $idpedido)->first();

                if($elpedido==null){
                    $pedidos = DB::table('datosventas')->where('idcliente', Auth::user()->id)->get();
                    $this->layout->content = View::make('usuario.pedidos', array('usuario'=>$usuario,
                    'pedidos'=>$pedidos)); 
                }else{

                    $this->layout->content = View::make('usuario.detallespedido', array(
                    'usuario'=>$usuario,'elpedido'=>$elpedido,'comentarios'=>$comentarios)); 
                }
                
                

            }

        }
        else
        {           
             return Redirect::to('/')->withInput(); 
        }  
    }


}