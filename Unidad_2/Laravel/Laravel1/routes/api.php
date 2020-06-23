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

//Listar empleado
Route::get('empleados', function(){
    $empleados = Empleado::get();
    return $empleados;
  });

//Crear empleado
Route::post('empleados', function(Request $request){
    //Valida los datos del empleado
    $request -> validate([
        'nombres' => 'required|max:50',
        'cedula' => 'required|max:20',
        'email' => 'required|max:50|email|unique:empleados',
        'lugar_nacimiento' => 'required|max:50',
        'sexo' => 'required|max:20',
        'telefono' => 'required|numeric'
    ]);
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

//Actualizar empleado
Route::put('empleados/{id}', function(Request $request, $id){
    //Valida los datos del empleado
    $request -> validate([
      'nombres' => 'required|max:50',
      'cedula' => 'required|max:20',
      'email' => 'required|max:50|email|unique:empleados,email,'.$id,
      'lugar_nacimiento' => 'required|max:50',
      'sexo' => 'required|max:20',
      'telefono' => 'required|numeric'
      //'apellidos' => 'required|max:50',
      //'nombres' => 'required|max:50',
    ]);
  
    $empleado = Empleado::findOrFail($id);
    $empleado -> nombres = $request -> input('nombres');
    $empleado -> cedula = $request -> input('cedula');
    $empleado -> email = $request -> input('email');
    $empleado -> lugar_nacimiento = $request -> input('lugar_nacimiento');
    $empleado -> sexo = $request -> input('sexo');
    $empleado -> telefono = $request -> input('telefono');
  
    $empleado -> save();
  
    return "Empleado actualizado";
  
  });
  
  //Eliminar empleado
  Route::delete('empleados/{id}', function($id){
    $empleado = Empleado::findOrFail($id);
    $empleado -> delete();
    return "Empleado eliminado";
  });