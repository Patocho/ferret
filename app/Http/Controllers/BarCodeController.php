<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;
use Dompdf\Dompdf;   

class BarCodeController extends Controller
{
    public function codigoBarra(){
    	$producto = Producto::all(["nombre","codigo"]);
    	$barra = new DNS1D();

    	//return view('codigo_de_barras',compact('producto','barra'));
    	$url = "codigo_de_barras";
    	
    	$view = \View::make($url,compact('producto','barra'))->render();
    	//$pdf = \App::make('dompdf.wrapper');
    	$pdf = new DOMPDF();
    	$pdf -> loadHTML($view);
    	$pdf->render();
    	return $pdf->stream('codigos de barra.pdf');
    }
}
