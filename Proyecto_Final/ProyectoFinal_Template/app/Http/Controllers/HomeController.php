<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        //Obtener los super admnistradores y administradores
        $datos = DB::table('users')
            ->select('*')
            ->whereRaw('tipo = "superadmin" OR tipo = "administrador"')
            ->get();
        //Obtener el numero total de médicos sin importar su tipo
        $numMedicos = DB::table('users')->count();
        //Obtener el numero total de pacientes
        $numPacientes = DB::table('t_pacientes')->count();
        //Obtener el numero total de citas
        $numCitas = DB::table('t_citas')->count();
        //Obtener el numero total de consultas
        $numConsultas = DB::table('t_consultas')->count();
        //Obtener el numero total de medicamentos
        $numMedicamentos = DB::table('t_medicamentos')->count();
        //Obtener el numero total de ventas
        $numVentas = DB::table('t_ventas')->count();
        return view('home', compact('datos','numMedicos','numPacientes','numCitas','numConsultas','numMedicamentos','numVentas'));
    }
}
