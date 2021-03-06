<?php

namespace App\Http\Controllers;

use App\t_medico;
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
        $datos = DB::table('t_pacientes')->join('t_medicos','t_medicos.id','=', 't_pacientes.id_medico')->select('t_pacientes.*','t_medicos.nombre AS mediconomb','t_medicos.apellidos AS medicoapell')->get();
        return view('pacientes.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = t_medico::all();
        return view('pacientes.create',compact('medicos'));
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
        $medicos = t_medico::all();
        return view('pacientes.edit',compact('pacientes','medicos'));
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
