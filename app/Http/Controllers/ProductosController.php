<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
Use Session;
Use Redirect;

class ProductosController extends Controller
{
    public function mostrarFormProducto(){
    	return view('form_registro_producto');
    }

    public function agregarProducto(Request $r){

    	/*echo("nombre: ".$r->nombre."</br>");
    	echo($r->codigo);
    	echo($r->descripcion);
    	echo($r->precio_venta);
    	echo($r->precio_costo);
    	echo($r->stock);
    	echo($r->categoria);*/

    	$producto = new Producto(array('nombre'=>$r->get('nombre'),
            'codigo'=>$r->get('codigo'),
            'descripcion'=>$r->get('descripcion'),
            'precio_venta'=>$r->get('precio_venta'),
            'precio_costo'=>$r->get('precio_costo'),
            'stock'=>$r->get('stock'),
            'categoria'=>$r->get('categoria'),

            ));

    	$producto->save();

    	$msj=["title" => "Producto", "text" => "Producto registrado con éxito"];
        return redirect()->action('ProductosController@mostrarFormProducto')->with("mensaje", $msj);



    }
}
