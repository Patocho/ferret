<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Cliente;
use App\Deuda;
Use Session;
Use Redirect;

class CuentasController extends Controller
{
    public function mostrarCuentas(){
    	$clientes=Cliente::all();
    	return view('cuentas',compact('clientes'));
    }


    public function deudas($id){
    	$cliente = Cliente::find($id);
    	$deudas = Cliente::find($id)->deudas;

    	$totalPagar = 0;

    	foreach ($deudas as $key => $deuda) {
    		$totalPagar+=$deuda->valor;
    	}
    
        return view('deudas',compact('cliente','deudas','totalPagar'));
    }

    public function pagarDeudas(Request $r){
    	
        foreach ($r->get("deuda") as $key => $val) {
            $deuda = Deuda::find($val);
            $deuda->delete();
        }
        echo ($r->id_cliente);
        $msj=["title" => "Registro", "text" => "Deudas Pagadas"];
        //return Redirect()->action('CuentasController@deudas',$r->id_cliente)->with("mensaje", $msj);
    }

    public function editar($id){
        $cliente = Cliente::find($id);

        return view('editar_cliente',compact('cliente'));
    }

    public function editaCliente(Request $r){

        $cliente = Cliente::find($r->id_cliente);

        $cliente->nombre = $r->nombre;
        $cliente->apellido = $r->apellido;
        $cliente->telefono = $r->telefono;
        $cliente->direccion = $r->direccion;
        $cliente->comentario = $r->comentario;

        $cliente->save();
        $msj=["title" => "Registro", "text" => "Cambio realizado"];
        return Redirect()->action('CuentasController@deudas',$r->id_cliente)->with("mensaje", $msj);
    }

    public function formDeuda($id){
        $cliente = Cliente::find($id);
        return view('agregar_deuda', compact('cliente'));
    }

    public function nuevaDeuda(Request $r){
        $cliente = Cliente::find($r->id_cliente);
        //$contador = Deuda::all()->count();
        $deuda = new Deuda(array('descripcion'=>$r->descripcion,
            'valor'=>$r->valor,
            ));

        $deuda->clientes()->associate($cliente);
        $deuda->save();

        $msj=["title" => "Registro", "text" => "Deuda agregada"];
        return Redirect()->action('CuentasController@deudas',$r->id_cliente)->with("mensaje", $msj);
    }
}
