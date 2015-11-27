<?php

class AdminpedidosController extends BaseController {

	protected $layout = 'layout.plantilla';

    public function ver()
    {    
    	if (Request::isMethod('get'))
        {
        	$pedidos = DB::table('datosventas')->where('estado', 1)->orderBy('id', 'desc')->get();
        	$this->layout->content = View::make('admin.lospedidos', array('pedidos'=>$pedidos) ); 
        }

        else if (Request::isMethod('post'))
        {
        	
            if ( Input::get('indi')==1){ 
                $estado=Input::get('estado');
                $pedidos = DB::table('datosventas')->where('estado', $estado)->orderBy('id', 'desc')->get();

                if ($estado==8){
                    $pedidos = DB::table('datosventas')->orderBy('id', 'desc')->get();
                }
                $this->layout->content = View::make('admin.lospedidos', array('pedidos'=>$pedidos) ); 

            }
            else if(Input::get('indi')==2)
            {

                $codigo=Input::get('codigo');
                $dni=Input::get('dni');
                $ruc=Input::get('ruc');

                if($codigo!=''){;
                    $pedidos = DB::table('datosventas')->where('codigo', $codigo)->orderBy('id', 'desc')->get();
                }
                if($dni!=''){

                    $usuario = DB::table('datosusuarios')->where('dni', $dni)->pluck('id');
                    $id=$usuario;
                    $pedidos = DB::table('datosventas')->where('idcliente', $id)->orderBy('id', 'desc')->get();
                }
                if($ruc!=''){
                    
                    $usuario = DB::table('datosusuarios')->where('ruc', $ruc)->pluck('id');
                    $id=$usuario;
                    $pedidos = DB::table('datosventas')->where('idcliente', $id)->orderBy('id', 'desc')->get();
                }


                $this->layout->content = View::make('admin.lospedidos', array('pedidos'=>$pedidos) ); 

            }

        }
         
    }

}