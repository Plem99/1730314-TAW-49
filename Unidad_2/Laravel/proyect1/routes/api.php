<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Empleado;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Listar empleados
Route::get('empleados', function(){
    $empleados = Empleado::get();
    return $empleados;
});

//Guardar fase 1
Route::post('empleados', function(Request $request){
    $empleado = new Empleado;
    $empleado->nombres = $request->input('nombres');
    $empleado->apellidos = $request->input('apellidos');
    $empleado->cedula = $request->input('cedula');
    $empleado->email = $request->input('email');
    $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
    $empleado->sexo = $request->input('sexo');
    $empleado->estado_civil = $request->input('estado_civil');
    $empleado->telefono = $request->input('telefono');
    $empleado->save();
    return 'Empleado crear';
});
