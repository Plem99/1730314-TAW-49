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
//Usuarios
Route::resource('medicos', 'UserController');
//Médicos
//Route::resource('medicos', 'TMedicoController');
//Medicamentos
Route::resource('medicamentos', 'TMedicamentoController');
//Pacientes
Route::resource('pacientes', 'TPacienteController');
//Perfil del paciente
Route::get('pacientes/{id}/profile', 'TPacienteController@profile');
//Perfil del Medico
Route::get('medicos/{id}/profile', 'UserController@profile');
//Crear datos del medico
Route::get('medicos/{id}/createDatos', 'UserController@createDatos');
Route::post('medicos/{id}/storeDatos', 'UserController@storeDatos');
Route::get('medicos/{id}/storeDatos', 'UserController@storeDatos');
Route::put('medicos/{id}/updateDatos', 'UserController@updateDatos');
Route::patch('medicos/{id}/updateDatos', 'UserController@updateDatos');
//Crear datos del paciente
Route::get('pacientes/{id}/createDatos', 'TPacienteController@createDatos');
Route::post('pacientes/{id}/storeDatos', 'TPacienteController@storeDatos');
Route::get('pacientes/{id}/storeDatos', 'TPacienteController@storeDatos');
Route::put('pacientes/{id}/updateDatos', 'TPacienteController@updateDatos');
Route::patch('pacientes/{id}/updateDatos', 'TPacienteController@updateDatos');
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
//Tipo de sangre
Route::resource('tiposangre', 'TTipoSangreController');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//fullcalender
Route::get('calendario/fullcalendar', ['as' => 'calendario.fullcalendar', 'uses' => 'FullCalendarController@index']);
Route::post('calendario/fullcalendar/create','FullCalendarController@create');
Route::post('calendario/fullcalendar/update','FullCalendarController@update');
Route::post('calendario/fullcalendar/delete','FullCalendarController@destroy');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

