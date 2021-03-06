@extends('layouts.app')
@section ('titulo', 'Administración de pacientes')
@section('read_paciente')
@guest
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listado de Pacientes') }}</div>
                <br>
                <div class="col-sm-8" style="padding-left: 30px;">
                    <a type="button" class="btn btn btn-outline-dark btn-sm" href="{{ route('pacientes.create') }}" >
                        {{ __('Nuevo Paciente') }}
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
                                                    <th>Teléfono</th>
                                                    <th>Email</th>
                                                    <th>Médico</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($datos as $paciente)
                                                    <tr>
                                                        {{--_create_empleados_table--}}
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$paciente->nombre}}</td>
                                                        <td>{{$paciente->apellidos}}</td>
                                                        <td>{{$paciente->sexo}}</td>
                                                        <td>{{$paciente->telefono}}</td>
                                                        <td>{{$paciente->email}}</td>
                                                        <td>{{$paciente->mediconomb}} {{$paciente->medicoapell}}</td>
                                                        <td>
                                                            <div style="display: flex;">
                                                                <a href="{{url('/pacientes/'.$paciente->id.'/edit')}}" style="padding: 5px;" class = "btn btn-outline-info"><i data-feather="edit"></i></a>
                                                                <a href="{{url('/pacientes/'.$paciente->id.'/profile')}}" style="padding: 5px;" class = "btn btn-outline-info"><i data-feather="alert-circle"></i></a>
                                                                <!--Eliminar empleado (icono)-->
                                                                <form action="{{url('/pacientes/'.$paciente->id)}}" method="POST">
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
                    @foreach($datos as $paciente)
                        <div class="card" style="width:350px;padding: 20px;">
                            <img class="card-img-top" src="../img/paciente.png" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">{{$paciente->nombre}}</h4>
                                <p class="card-subtitle mb-2 text-muted"><b>Médico:</b> {{$paciente->mediconomb}} {{$paciente->medicoapell}}</p>
                                <p class="card-text"><b>Sexo:</b> {{$paciente->sexo}}</p>
                                <p class="card-text"><b>Email:</b> {{$paciente->email}}</p>
                                <p class="card-text"><b>Teléfono:</b> {{$paciente->telefono}}</p>
                                <br>
                                <div style="display: flex;">
                                    <a href="{{url('/pacientes/'.$paciente->id.'/edit')}}" style="padding: 5px;" class = "btn btn-outline-info"><i data-feather="edit"></i></a>
                                    <a href="{{url('/pacientes/'.$paciente->id.'/profile')}}" style="padding: 5px;" class = "btn btn-outline-info"><i data-feather="alert-circle"></i></a>
                                    <!--Eliminar empleado (icono)-->
                                    <form action="{{url('/pacientes/'.$paciente->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button style="padding: 5px;" onclick="return confirm('¿Borrar?');"  class="btn btn-outline-danger"><i data-feather="trash"></i></button>
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


