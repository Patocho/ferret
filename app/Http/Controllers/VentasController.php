<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function mostrarVistaVentas(){
    	return view('Ventas');
    }
}
