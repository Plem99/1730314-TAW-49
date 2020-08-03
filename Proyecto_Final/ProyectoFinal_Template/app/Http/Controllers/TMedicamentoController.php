<?php

namespace App\Http\Controllers;

use DB;
use App\t_medicamento;
use Illuminate\Http\Request;

class TMedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar datos almacenados
        $datos = t_medicamento::all();
        return view('medicamentos.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamentos = t_medicamento::all();
        return view('medicamentos.create',compact('medicamentos'));
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
        t_medicamento::insert($datos);

        return redirect('medicamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_medicamento  $t_medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(t_medicamento $t_medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_medicamento  $t_medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = t_medicamento::findOrFail($id);
        return view('medicamentos.edit',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_medicamento  $t_medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        t_medicamento::where('id','=',$id)->update($datos);
        return redirect('medicamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_medicamento  $t_medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        t_medicamento::destroy($id);
        return redirect('medicamentos');
    }
}
