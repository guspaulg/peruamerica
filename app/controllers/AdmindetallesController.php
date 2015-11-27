<?php

class AdmindetallesController extends BaseController {

	protected $layout = 'layout.plantilla';

    public function ver()
    {    
  
        
            $idpedido = Input::get('idpedido');
            $elpedido = DB::table('datosventas')->where('id', $idpedido)->first();
            $comentarios = DB::table('comentarios')->where('id_pedido', $idpedido)->orderBy('id', 'desc')->get();
            $idcliente=Input::get('idcliente');
            $usuario = DB::table('datosusuarios')->where('id', Input::get('idcliente'))->first();

            if (Request::isMethod('get')){ 

                if($elpedido==null){
                    $pedidos = DB::table('datosventas')->get();
                    $this->layout->content = View::make('admin.lospedidos', array('pedidos'=>$pedidos)); 
                }else{

                    $this->layout->content = View::make('admin.detallespedido', array(
                    'usuario'=>$usuario,'elpedido'=>$elpedido,'comentarios'=>$comentarios)); 
                }

            } else if (Request::isMethod('post')){

                $indi=Input::get('indi');

                if($indi==1){

                    $rules = array(
                    'img' => 'required|mimes:jpeg,png',
                    );
                    
                    $validator = Validator::make(Input::all(), $rules);
                    if ($validator->fails()) 
                    {                
                        return Redirect::to('/admin/detalles?idpedido='.$idpedido.'&idcliente='.$idcliente)
                                ->withErrors($validator)->withInput();                
                    }

                    $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $su = strlen($an) - 1;
                    $codigo= substr($an, rand(0, $su), 1) .substr($an, rand(0, $su), 1).substr($an, rand(0, $su), 1);


                    $img = Input::file('img');
                    $idpedido = Input::get('idpedido');
                    $destino ='imagenes/disenos/'.$idpedido;
                    $img->move( $destino , $codigo.$img->getClientOriginalName() );

                    $ruta=$destino.'/'.$codigo.$img->getClientOriginalName();

                    $pedido = Datosventa::find($idpedido);
                    if(Input::get('num')== 1) { $pedido->img= $ruta;}
                    if(Input::get('num')== 2) { $pedido->img2= $ruta;}
                    if(Input::get('num')== 3) { $pedido->img3= $ruta;}
                    $pedido->estado= 2;
                    $pedido->save();
                    $elpedido = DB::table('datosventas')->where('id', $idpedido)->first();
                    $comentarios = DB::table('comentarios')->where('id_pedido', $idpedido)->orderBy('id', 'desc')->get();

                    $this->layout->content = View::make('admin.detallespedido', array(
                    'usuario'=>$usuario,'elpedido'=>$elpedido,'comentarios'=>$comentarios)); 
                }

                if($indi==2){

                    $pedido = Datosventa::find($idpedido);
                    $pedido->estado= Input::get('estado');
                    $pedido->save();

                    $elpedido = DB::table('datosventas')->where('id', $idpedido)->first();
                    $comentarios = DB::table('comentarios')->where('id_pedido', $idpedido)->orderBy('id', 'desc')->get();

                    $this->layout->content = View::make('admin.detallespedido', array(
                    'usuario'=>$usuario,'elpedido'=>$elpedido,'comentarios'=>$comentarios)); 
                }



            }

        
    }


}