<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use DB;

class empleadosController extends Controller
{
    //Generacion de cada uno de los metodos para hacer CRUD a la BD.
    //1. Método de Listado de empleados.
    public function index(){
        $empleados = Empleado::all();
        //Mostrar en la vista el listado de mepleados
        return view('empleados.admin_empleados',compact('empleados'));
    }

    //2. Método para crear nuevo empleado
    public function create(){
        return view('empleados.alta_empleado', compact('empleados'));
    }

    //3. Almacenar empleados
    public function store(Request $request){
        //Retirar datos del request previo
        $datosempleado = request()->except($datosempleado);

        //Insertar en la tabla de la BD empleados el nuevo registro
        $id = DB::table('empleados')->insertGetId($datosempleado);

        Alert::success('Datos guardados del empleado exitosamente');

        //Redirección de URL después de guardar
        return redirect('empleados');
    }

    //4. Editar empleados
    public function edit($id){
        //Edición de empleados y mandar a la vista correspondiente para editar
        $empleados = Empleado::findOrFail($id);
        //Una vez encontrado, mostrar la vista para editar
        return view('empleados.editar_empleado', compact('empleados'));
    }
}
