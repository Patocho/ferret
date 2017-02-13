<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Cliente;
Use Session;
Use Redirect;

class ClientesController extends Controller
{
	public function mostrarFormCliente(){
    	return view('form_registro_cliente');
    }

    public function registrarCliente(Request $r){
    	/*echo("nombre: ".$r->nombre."</br>");
    	echo($r->telefono ."</br>");
    	echo($r->direccion ."</br>");*/

    	$cliente = new Cliente(array('nombre'=>$r->get('nombre'),
            'telefono'=>$r->get('telefono'),
            'direccion'=>$r->get('direccion'),

            ));

    	$cliente->save();

    	$msj=["title" => "Cliente", "text" => "Cliente registrado con éxito"];
        return redirect()->action('ClientesController@mostrarFormCliente')->with("mensaje", $msj);
    }

    public function mostrarClientes(){
    	$clientes = Cliente::all();
    	return view('lista_clientes',compact('clientes'));
    }

    function AJAX_busquedaClientes($texto){
        $clientes=DB::table('cliente')->where('nombre','LIKE','%'.$texto.'%')->first();
        return $clientes; 
        //return response()->json($clientes);
    }
}
