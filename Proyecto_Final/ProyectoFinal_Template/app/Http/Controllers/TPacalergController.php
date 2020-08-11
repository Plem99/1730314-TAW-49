<?php

namespace App\Http\Controllers;

use DB;
use App\t_pacalerg;
use Illuminate\Http\Request;

class TPacalergController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        t_pacalerg::insert($datos);

        return redirect('consultas/'.$id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_pacalerg  $t_pacalerg
     * @return \Illuminate\Http\Response
     */
    public function show(t_pacalerg $t_pacalerg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_pacalerg  $t_pacalerg
     * @return \Illuminate\Http\Response
     */
    public function edit(t_pacalerg $t_pacalerg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_pacalerg  $t_pacalerg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, t_pacalerg $t_pacalerg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_pacalerg  $t_pacalerg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$idconsulta)
    {
        DB::table('t_pacalergs')->where('id_alergia', $id)->delete();
        //t_pacalerg::destroy($id);
        return redirect('consultas/'.$idconsulta.'/edit');
    }
}
