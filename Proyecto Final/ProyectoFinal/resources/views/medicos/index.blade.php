@extends('layouts.app')
@section ('titulo', 'Administración de medicos')
@section('read_medico')
@guest
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listado de Médicos') }}</div>
                <br>
                <div class="col-sm-8" style="padding-left: 30px;">
                    <a type="button" class="btn btn btn-outline-dark btn-sm" href="{{ route('medicos.create') }}" >
                        {{ __('Nuevo Médico') }}
                    </a>
                </div>
                <ul class="nav nav-tabs" style="padding: 20px;">
                    <li><a class="nav-link border" id="tabvistas" data-toggle="tab" href="#vistas">Vista</a></li>
                    <li><a class="nav-link border" id="tabtablas" data-toggle="tab" href="#tablas">Tabla</a></li>
                </ul>
                <div style="padding: 20px;" class="tab-content">
                    
                    <div style="padding: 20px;" id="tablas" class="tab-pane fade border">
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
                                                    <th>Sexo</th>
                                                    <th>Email</th>
                                                    <th>Contraseña</th>
                                                    <th>Teléfono</th>
                                                    <th>Tipo</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($datos as $medico)
                                                    <tr>
                                                        {{--_create_empleados_table--}}
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$medico->nombre}}</td>
                                                        <td>{{$medico->apellidos}}</td>
                                                        <td>{{$medico->sexo}}</td>
                                                        <td>{{$medico->email}}</td>
                                                        <td>{{$medico->contrasena}}</td>
                                                        <td>{{$medico->telefono}}</td>
                                                        <td>{{$medico->tipo}}</td>
                                                        <td>
                                                            <div style="display: flex;">
                                                                <a href="{{url('/medicos/'.$medico->id.'/edit')}}" style="padding: 5px;" class = "btn btn-outline-info"><i data-feather="edit"></i></a>
                                                                <!--Eliminar empleado (icono)-->
                                                                <form action="{{url('/medicos/'.$medico->id)}}" method="POST">
                                                                    {{csrf_field()}}
                                                                    {{method_field('DELETE')}}
                                                                    <button style="padding: 5px;" onclick="return confirm('¿Borrar?');" class="btn btn-outline-danger"><i data-feather="trash"></i></button>
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
                    <div style="padding: 20px;display:flex;" id="vistas" class="tab-pane fade border row">
                    @foreach($datos as $medico)
                        <div class="card" style="width:350px;padding: 20px;">
                            <img class="card-img-top" src="../img/img_avatar1.png" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">{{$medico->nombre}}</h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{$medico->tipo}}</h6>
                                <p class="card-text"><b>Sexo:</b> {{$medico->sexo}}</p>
                                <p class="card-text"><b>Email:</b> {{$medico->email}}</p>
                                <p class="card-text"><b>Teléfono:</b> {{$medico->telefono}}</p>
                                <br>
                                <div style="display: flex;">
                                    <a href="{{url('/medicos/'.$medico->id.'/edit')}}" style="padding: 5px;" class = "btn btn-outline-info"><i data-feather="edit"></i></a>
                                    <!--Eliminar empleado (icono)-->
                                    <form action="{{url('/medicos/'.$medico->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button style="padding: 5px;" onclick="return confirm('¿Borrar?');" class="btn btn-outline-danger"><i data-feather="trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endguest
<script>
    $(document).ready(function(){
        $('#tabvistas').trigger('click');
        $("#tabtablas").click(function(){
            $("#tablas").show();
            $("#vistas").hide();
        });
        $("#tabvistas").click(function(){
            $("#vistas").show();
            $("#tablas").hide();
        });
    });
</script>
@endsection


