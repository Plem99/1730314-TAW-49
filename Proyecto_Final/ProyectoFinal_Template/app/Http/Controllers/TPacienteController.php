<?php

namespace App\Http\Controllers;

use App\t_tipo_sangre;
use App\User;
use App\t_paciente_datos;
use DB;
use App\t_paciente;
use Illuminate\Http\Request;

class TPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('t_pacientes')
            ->join('users','users.id','=', 't_pacientes.id_medico')
            ->select('t_pacientes.*','users.name AS mediconomb','users.apellidos AS medicoapell')
            //->where('users.tipo', '<>', 'secretario')
            ->get();
        return view('pacientes.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Para no poder seleccionar a un secretario como medico
        $medicos = User::all()->where('tipo', '<>', 'secretario');
        
        return view('pacientes.create',compact('medicos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDatos($id)
    {
        //Para no poder seleccionar a un secretario como medico
        $paciente = t_paciente::findOrFail($id);
        $tiposangres = t_tipo_sangre::all();
        return view('pacientes.createDatos',compact('paciente','id','tiposangres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //No mandaremos el _token
        $datos = request()->except('_token');
        //Insertar datos en el modelo
        t_paciente::insert($datos);

        return redirect('pacientes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDatos(Request $request, $id)
    {
        //No mandaremos el _token
        $datos = request()->except('_token');
        //Insertar datos en el modelo
        t_paciente_datos::insert($datos);

        return redirect('pacientes/'.$id.'/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_paciente  $t_paciente
     * @return \Illuminate\Http\Response
     */
    public function show(t_paciente $t_paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_paciente  $t_paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacientes = t_paciente::findOrFail($id);
        //Para no poder seleccionar a un secretario como medico
        $medicos = User::all()->where('tipo', '<>', 'secretario');
        return view('pacientes.edit',compact('pacientes','medicos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_paciente  $t_paciente
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        //$pacientes = t_paciente::findOrFail($id);
        $datosPac = DB::table('t_pacientes')
            ->join('t_paciente_datos','t_paciente_datos.id_paciente','=', 't_pacientes.id')
            ->join('t_tipo_sangres','t_tipo_sangres.id','=', 't_paciente_datos.id_tipo_sangre')
            ->select('t_paciente_datos.*','t_tipo_sangres.*')
            ->where('t_pacientes.id', '=', $id)
            ->get();
        
        $datos = DB::table('t_pacientes')
            ->join('users','users.id','=', 't_pacientes.id_medico')
            ->select('t_pacientes.*','users.name AS mediconomb','users.apellidos AS medicoapell')
            ->where('t_pacientes.id', '=', $id)
            ->get();
            
        $numpac = DB::table('t_pacientes')->count();

        $newdatos = t_paciente_datos::where('id_paciente', '=', $id)->exists();
        
        return view('pacientes.profile',compact('datos','datosPac','numpac','newdatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_paciente  $t_paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        t_paciente::where('id','=',$id)->update($datos);
        return redirect('pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_paciente  $t_paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        t_paciente::destroy($id);
        return redirect('pacientes');
    }
}
