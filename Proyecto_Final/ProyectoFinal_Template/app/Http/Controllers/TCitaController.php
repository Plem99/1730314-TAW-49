<?php

namespace App\Http\Controllers;

use App\t_paciente;
use DB;
use App\t_cita;
use Illuminate\Http\Request;

class TCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$datos = DB::table('t_citas')
            ->join('t_pacientes','t_pacientes.id','=', 't_citas.id_paciente')
            ->select('t_citas.*','t_pacientes.id_medico AS medico','t_pacientes.nombre AS paciente')
            ->get();*/
        $datos = DB::table('t_citas')
            ->join('t_pacientes','t_pacientes.id','=', 't_citas.id_paciente')
            ->join('users','users.id','=', 't_pacientes.id_medico')
            ->select('t_citas.*','users.name AS medico', 'users.apellidos AS medicoApell','t_pacientes.nombre AS paciente', 't_pacientes.apellidos AS pacienteapell')
            ->get();
        return view('citas.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = t_paciente::all();
        return view('citas.create',compact('pacientes'));
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
        t_cita::insert($datos);

        return redirect('citas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_cita  $t_cita
     * @return \Illuminate\Http\Response
     */
    public function show(t_cita $t_cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_cita  $t_cita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citas = t_cita::findOrFail($id);
        $pacientes = t_paciente::all();
        return view('citas.edit',compact('citas','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_cita  $t_cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        t_cita::where('id','=',$id)->update($datos);
        return redirect('citas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_cita  $t_cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        t_cita::destroy($id);
        return redirect('citas');
    }
}
