<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Elemento;
use App\Departamento;
use App\TipoMovimiento;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/plantilla', function () {
    return view('plantilla');
})->name('pl');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


//Rutas para registro de usuarios
Route::get('/registro', function () {
    return view('auth.registro');
});

Route::post('/registrar','Auth\RegistroController@nuevo')->name('registrar');

Route::middleware(['auth'])->group(function (){

    Route::get('/admin', function () {
        return view('admin.admin');
    });

    //Rutas para incorporacion de bienes
    Route::resource('bienes','BienesController');
    Route::get('bienes/{id}/desincorporar','BienesController@desincorporacion');
    Route::post('bienes/{id}/desincorporar','BienesController@desincorporacion');

    Route::post('/elementos','ElementosController@getElementosAjax');

    //Departamentos AJAX
    Route::post('/bienes/departamentos/{direccion}','DepartamentosController@getDepartamentosAjax');

    Route::post('/tipo_movimientos','TipoMovimientosController@getTipoMovimientosAjax');

    Route::get('/bienes/bien/{bien}/cantidad/{cantidad}','BienesController@getLastAjax');

    //Ordenes
    Route::resource('orden','OrdenesController');

    //Proveedores
    Route::resource('proveedor','ProveedoresController');
    Route::post('proveedorJson','ProveedoresController@getProveedoresAjax');
    Route::post('orden/proveedorJson','ProveedoresController@getProveedoresAjax');//NO BORRAR
    Route::post('orden/{id}/proveedorJson','ProveedoresController@getProveedoresAjax');//NO BORRAR

    //Tipos de movimiento
    Route::resource('tipo-movimiento','TipoMovimientosController');

    //Direcciones
    Route::resource('direccion','DireccionesController');

    //Ruta para salir del sistema.
    Route::get('/salir',function (){
        Auth::logout();
        return redirect('/login');
    })->name('salir');
});

Route::post('/autenticar','Auth\LoginController@autenticar')->name('loguear');
