<?php

namespace App\Http\Controllers;

use DB;
use App\t_medico;
use Illuminate\Http\Request;

class TMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar datos almacenados
        $datos = t_medico::all();
        return view('medicos.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = t_medico::all();
        return view('medicos.create',compact('medicos'));
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
        t_medico::insert($datos);

        return redirect('medicos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_medico  $t_medico
     * @return \Illuminate\Http\Response
     */
    public function show(t_medico $t_medico)
    {
        
        return view('medicos.medic_profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_medico  $t_medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicos = t_medico::findOrFail($id);
        return view('medicos.edit',compact('medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_medico  $t_medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        t_medico::where('id','=',$id)->update($datos);
        return redirect('medicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_medico  $t_medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        t_medico::destroy($id);
        return redirect('medicos');
    }
}
