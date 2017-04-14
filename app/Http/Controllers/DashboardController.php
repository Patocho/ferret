<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deuda;

class DashboardController extends Controller
{
    public function mostrarDashboard(){
    	$deudas = Deuda::all();
    	$total = 0;
    	$cantidad = Deuda::all()->count();
    	foreach ($deudas as $key => $deuda) {
    		$total = $total + $deuda->valor;
    		//echo($total);
    	}
    	return view('Dashboard',compact('total','deudas'));
    }
}
