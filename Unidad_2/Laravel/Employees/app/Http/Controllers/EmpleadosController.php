<?php

namespace App\Http\Controllers;

use App\Departamentos;
use DB;
use App\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar datos almacenados
        $datos = DB::table('empleados')->join('departamentos','departamentos.id','=', 'empleados.id_departamentos')->select('empleados.*','departamentos.nombre AS departamento')->get();
        return view('empleados.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamentos::all();
        return view('empleados.create',compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Almacenar todos los datos que se envian al metodo de store
        //$datos = request()->all();

        //No mandaremos el _token
        $datos = request()->except('_token');
        //Insertar datos en el modelo
        Empleados::insert($datos);

        //return response()->json($datos);
        return redirect('empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleados::findOrFail($id);
        $departamentos = Departamentos::all();
        return view('empleados.edit',compact('empleado','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        Empleados::where('id','=',$id)->update($datos);
        return redirect('empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleados::destroy($id);
        return redirect('empleados');
    }
}
