<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('principal');
});


Route::get('login','Auth\AuthController@mostrarLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::get('/dashboard','DashboardController@mostrarDashboard');
Route::get('/ventas','VentasController@mostrarVistaVentas');


Route::get('/cliente-nuevo','ClientesController@mostrarFormCliente');
Route::post('/cliente-nuevo','ClientesController@registrarCliente');
Route::get('/clientes','ClientesController@mostrarClientes');
Route::get('API/buscarCliente/{texto}','ClientesController@AJAX_busquedaClientes');
Route::get('API/buscarProducto/{texto}','ProductosController@busquedaProductos');


Route::get('/nuevoproducto','ProductosController@mostrarFormProducto');
Route::post('/nuevoproducto','ProductosController@agregarProducto');
Route::get('/productos','ProductosController@mostrarProductos');

Route::get('/cuentas','CuentasController@mostrarCuentas');
Route::get('/cuentas/{id}','CuentasController@deudas');
Route::post('/cuentas/{id}','CuentasController@pagarDeudas');



Route::get('/barcode','BarCodeController@codigoBarra');


// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/cuentas/{id}/editar','CuentasController@editar');
Route::post('/cuentas/{id}/editar','CuentasController@editaCliente');
Route::get('/cuenta/{id}/registrar','CuentasController@formDeuda');
Route::post('/cuenta/{id}/registrar','CuentasController@nuevaDeuda');