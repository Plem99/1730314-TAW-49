<?php

namespace App\Http\Controllers;

use App\User;
use App\t_servicio;
use DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        //return view('users.index', ['users' => $model->paginate(15)]);
        $datos = User::all();
        return view('medicos.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = User::all();
        return view('medicos.create',compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDatos($id)
    {
        //Para no poder seleccionar a un secretario como medico
        $medico = User::findOrFail($id);
        return view('medicos.createDatos',compact('medico','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, array $data)
    {
        //No mandaremos el _token
        $datos = request()->except('_token');
        //$datos = request()->fill(['password' => Hash::make($request['password'])]);
        //Insertar datos en el modelo
        /*return User::create([
            'name' => $data['name'],
            'apellidos' => $data['apellidos'],
            'sexo' => $data['sexo'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telefono' => $data['telefono'],
            'tipo' => $data['tipo'],
        ]);*/
        User::insert($datos);

        return redirect('medicos');
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
        t_servicio::insert($datos);

        return redirect('medicos/'.$id.'/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        
        //return view('medicos.medic_profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $t_medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicos = User::findOrFail($id);
        return view('medicos.edit',compact('medicos'));
    }

    public function profile($id)
    {
        //Obtener los datos del medico 
        $datos = User::findOrFail($id);
        //Obtener los datos del paciente (mas especificos)
        $datosServ = DB::table('users')
            ->join('t_servicios','t_servicios.id_medico','=', 'users.id')
            ->select('t_servicios.*')
            ->where('t_servicios.id_medico', '=', $id)
            ->get();
        //Obtener numero de pacientes registrados con x medico
        $numpac = DB::table('t_pacientes')
            ->join('users','users.id','=', 't_pacientes.id_medico')
            //->select('t_pacientes.*','users.*')
            ->where('t_pacientes.id_medico', '=', $id)
            ->count();
        //Validar si existe un registro de datos para x medico
        $newdatos = t_servicio::where('id_medico', '=', $id)->exists();
        
        return view('medicos.profile',compact('datos','datosServ','numpac','newdatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        User::where('id','=',$id)->update($datos);
        return redirect('medicos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $Users
     * @return \Illuminate\Http\Response
     */
    public function updateDatos(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        t_servicio::where('id','=',$id)->update($datos);
        //return redirect('pacientes');
        return redirect('medicos/'.$id.'/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('medicos');
    }
}
