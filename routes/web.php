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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/plantilla', function () {
    return view('plantilla');
})->name('pl');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::middleware(['auth'])->group(function (){

    Route::get('/admin', function () {
        return view('admin.admin');
    });

    //Rutas para registro de usuarios
    Route::get('/registro', function () {
        return view('auth.registro');
    });

    Route::post('/registrar','Auth\RegistroController@nuevo')->name('registrar');

    //Rutas para incorporacion de bienes
    Route::get('/incorporacion',function (){
        return view("gestion_bienes.nuevo");
    })->name('incorporacion');

    Route::post('/incorporar')->name('incorporar');

    //Ruta para salir del sistema.
    Route::get('/salir',function (){
        Auth::logout();
        return redirect('/login');
    })->name('salir');
});

Route::post('/autenticar','Auth\LoginController@autenticar')->name('loguear');
