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

    Route::get('/usuario/editar/{id}', 'UserController@editar')->name('user.editar');
    Route::put('/usuario/editado/{id}', 'UserController@update')->name('user.update');


    Route::get('/admin', function () {
        return view('admin.admin');
    });

    //Bienes
    Route::resource('bienes','BienesController');
    Route::get('bienes/{id}/desincorporar','BienesController@desincorporacion')->name('bienes.desincorporar');
    Route::put('bienes/{id}/desincorporar','BienesController@desincorporado')->name('bienes.desincorporado');
    Route::get('bienes/reportes/index','BienesController@reportes')->name('bienes.reportes');

    //Bienes desincorporados
    Route::resource('desincorporacion','DesincorporacionController');

    //Reportes
    Route::get('bm1/{tipoUnidad}/{id}/bm1','ReportesController@BM1')->name('reportes.bm1');
    Route::get('bm2/{tipoUnidad}/{id}/{mes}/{ano}','ReportesController@BM2')->name('reportes.bm2');
    Route::get('bm4/{id}/{mes}/{ano}','ReportesController@BM4')->name('reportes.bm4');

    Route::post('/elementos','ElementosController@getElementosAjax');

    //Departamentos AJAX
    Route::post('/bienes/departamentos/{direccion}','DepartamentosController@getDepartamentosAjax');

    //Tipos de movimientos AJAX
    Route::post('/tipo_movimientos','TipoMovimientosController@getTipoMovimientosAjax');

    //Ultimo bien por codigo AJAX
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

    //Departamentos
    Route::resource('departamento','DepartamentosController');

    //Ruta para salir del sistema.
    Route::get('/salir',function (){
        Auth::logout();
        return redirect('/login');
    })->name('salir');
});

Route::post('/autenticar','Auth\LoginController@autenticar')->name('loguear');
