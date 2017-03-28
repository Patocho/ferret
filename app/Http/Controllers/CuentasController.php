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
            echo ($val);
        }
    }
}
