<?php

namespace App\Http\Controllers;

use App\t_paciente;
use App\t_consulta;
use DB;
use Illuminate\Http\Request;

class TConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('t_consultas')
            ->join('t_pacientes','t_pacientes.id','=', 't_consultas.id_paciente')
            ->join('users','users.id','=', 't_pacientes.id_medico')
            ->select('t_consultas.*','users.name AS medico', 'users.apellidos AS medicoApell','t_pacientes.nombre AS paciente', 't_pacientes.apellidos AS pacienteapell')
            ->get();
        return view('consultas.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = t_paciente::all();
        return view('consultas.create',compact('pacientes'));
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
        t_consulta::insert($datos);

        return redirect('consultas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_consulta  $t_consulta
     * @return \Illuminate\Http\Response
     */
    public function show(t_consulta $t_consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_consulta  $t_consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultas = t_consulta::findOrFail($id);
        $pacientes = t_paciente::all();
        $alergias = $datos = DB::table('t_pacalergs')
            ->join('t_pacientes','t_pacientes.id','=', 't_pacalergs.id_paciente')
            ->join('t_alergias','t_alergias.id','=', 't_pacalergs.id_alergia')
            ->select('t_pacientes.*','t_alergias.*')
            //->whereRaw('t_pacientes.id = "$id" ')
            ->get();
        return view('consultas.edit',compact('consultas','pacientes','alergias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_consulta  $t_consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        t_consulta::where('id','=',$id)->update($datos);
        return redirect('consultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_consulta  $t_consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        t_consulta::destroy($id);
        return redirect('consultas');
    }
}
