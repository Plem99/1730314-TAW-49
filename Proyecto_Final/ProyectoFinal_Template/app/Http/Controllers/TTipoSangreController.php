<?php

namespace App\Http\Controllers;

use App\t_tipo_sangre;
use Illuminate\Http\Request;

class TTipoSangreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = t_tipo_sangre::all();
        return view('tiposangre.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposangre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        //Insertar datos en el modelo
        t_tipo_sangre::insert($datos);

        return redirect('tiposangre');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_tipo_sangre  $t_tipo_sangre
     * @return \Illuminate\Http\Response
     */
    public function show(t_tipo_sangre $t_tipo_sangre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_tipo_sangre  $t_tipo_sangre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = t_tipo_sangre::findOrFail($id);
        return view('tiposangre.edit',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_tipo_sangre  $t_tipo_sangre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        t_tipo_sangre::where('id','=',$id)->update($datos);
        return redirect('tiposangre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_tipo_sangre  $t_tipo_sangre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        t_tipo_sangre::destroy($id);
        return redirect('tiposangre');
    }
}
