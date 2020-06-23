<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Ruta de listado de productos (GET)
Route::get('/productos', function () {
    return ('Listado de Productos');
});

//Ruta de listado de productos (POST)
Route::post('/productos', function () {
    return ('Almacenando Productos');
});

//Ruta de listado de productos (PUT)
Route::put('/productos/{id}', function ($id) {
    return ('Actualizando Productos ' . $id);
});


//Ruta que acepte numeros en un rango
Route::get('/productos2/{id}', function ($id) {
    return ('Mostrando Productos: ' . $id);
})->where('id','[0-9]+');


//Ruta con parámetros opcionales
Route::get('/saludo/{$name}/{$nickname?}', function ($name, $nickname = null) {
    //Poner primera letra en mayuscula
    $name = ucfirst($name);
    //Validar si un usuario tiene nickname
    if($nickname){
        return ("Bienvenido {$nickname}, tu nickname es {$nickname}");
    }else{
        return ("Bienvenido {$name}");
    }
    
});