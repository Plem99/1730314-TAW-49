@extends('layouts.app')
@section ('titulo', 'Administración de empleados')
@section('read')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listado de Empleados') }}</div>
                <br>
                <div class="col-sm-8" style="padding-left: 30px;">
                    <a type="button" class="btn btn btn-outline-dark btn-sm" href="{{ route('empleados.create') }}" >
                        {{ __('Nuevo Empleado') }}
                    </a>
                </div>
                <div class = "card-body">
                    <div class = "row">
                        <div class = "col-sm-12">
                            <div class = "card-box table-responsive">
                                <table id="datatable-keytable" class="table  table-stripped table-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre(s)</th>
                                            <th>Apellidos</th>
                                            <th>Cédula</th>
                                            <th>Email</th>
                                            <th>Lugar de Nacimiento</th>
                                            <th>Sexo</th>
                                            <th>Estado Civil</th>
                                            <th>Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($empleados as $empleado)
                                            <tr>
                                                {{--_create_empleados_table--}}
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$empleado->nombres}}</td>
                                                <td>{{$empleado->apellidos}}</td>
                                                <td>{{$empleado->cedula}}</td>
                                                <td>{{$empleado->email}}</td>
                                                <td>{{$empleado->lugar_nacimiento}}</td>
                                                <td>{{$empleado->sexo}}</td>
                                                <td>{{$empleado->estado_civil}}</td>
                                                <td>{{$empleado->telefono}}</td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <a href="{{url('/empleados/'.$empleado->id.'/edit')}}" style="padding: 5px;" class = "btn btn-secondary"><i data-feather="edit"></i></a>
                                                        <!--Eliminar empleado (icono)-->
                                                        <form action="{{url('/empleados/'.$empleado->id)}}" method="POST">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button style="padding: 5px;" onclick="return confirm('¿Borrar?');" class="btn btn-danger"><i data-feather="trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
