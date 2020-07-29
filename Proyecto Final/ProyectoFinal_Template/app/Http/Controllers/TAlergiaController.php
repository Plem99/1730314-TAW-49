<?php

namespace App\Http\Controllers;

use DB;
use App\t_alergia;
use Illuminate\Http\Request;

class TAlergiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar datos almacenados
        $datos = t_alergia::all();
        return view('alergias.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos = t_alergia::all();
        return view('alergias.create',compact('datos'));
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
        t_alergia::insert($datos);

        return redirect('alergias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_alergia  $t_alergia
     * @return \Illuminate\Http\Response
     */
    public function show(t_alergia $t_alergia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_alergia  $t_alergia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = t_alergia::findOrFail($id);
        return view('alergias.edit',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_alergia  $t_alergia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        t_alergia::where('id','=',$id)->update($datos);
        return redirect('alergias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_alergia  $t_alergia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        t_alergia::destroy($id);
        return redirect('alergias');
    }
}
