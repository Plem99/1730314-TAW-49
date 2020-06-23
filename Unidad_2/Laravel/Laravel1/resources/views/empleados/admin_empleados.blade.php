@extends('layout.patron');
@section ('titulo', 'Administración de empleados');
@section ('contenido');
    <div class = "right_col" role="main">
        <div class = "">
            <div class = "page-title">
                <div class = "title_left">
                    <h3> Administración de Empleados </h3>
                </div>
            </div>
        </div>
        <div class = "clearfix"></div>
        <div class = "x_panel">
            <div class = "x_title">
                <h2> Listado de Empleados </div>
                <div class = "clearfix"></div>
            </div>
            <div class = "x_content">
                <div class = "row">
                    <div class = "row">
                        <div class = "col-sm-12">
                            <div class = "card-box table-responsive">
                                <table id="datatable-keytable" class="table  table-stripped table-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
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
                                        @foreach($empleados as $empleados)
                                            <tr>
                                                _create_empleados_table
                                                <td>{{$empleados->nombres}}</td>
                                                <td>{{$empleados->apellidos}}</td>
                                                <td>{{$empleados->cedula}}</td>
                                                <td>{{$empleados->email}}</td>
                                                <td>{{$empleados->lugar_nacimiento}}</td>
                                                <td>{{$empleados->sexo}}</td>
                                                <td>{{$empleados->estado_civil}}</td>
                                                <td>{{$empleados->telefono}}</td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <a href="{{url('empleados/'.$empleados->id.'/edit')}}" class = "btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                        <!--Eliminar empleado (icono)-->
                                                        <form action="{{url('empleados/'.$empleados->id)}}" method="POST">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
@endsection