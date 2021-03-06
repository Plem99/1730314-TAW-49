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
//Login
Auth::routes();
//Home
Route::get('/home', 'HomeController@index')->name('home');
//Médicos
Route::resource('medicos', 'TMedicoController');
//Medicamentos
Route::resource('medicamentos', 'TMedicamentoController');
//Pacientes
Route::resource('pacientes', 'TPacienteController');
//Servicios
Route::resource('servicios', 'TServicioController');
//Ventas
Route::resource('ventas', 'TVentaController');
//Consultas
Route::resource('consultas', 'TConsultaController');
//Citas
Route::resource('citas', 'TCitaController');
//Alergias
Route::resource('alergias', 'TAlergiaController');