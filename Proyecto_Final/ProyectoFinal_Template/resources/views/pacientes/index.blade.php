@extends('layouts.app', [
    'namePage' => 'pacientes',
    'class' => 'sidebar-mini',
    'activePage' => 'pacientes',
])
@section ('titulo', 'Administración de pacientes')
@section('content')
@guest
@else

<?php
    function cambio($sexo){
        if($sexo=="masculino"){
            echo "Hombre";
        }else if($sexo=="femenino"){
            echo "Mujer";
        }else if($sexo=="no especificado"){
            echo "No especificado";
        }
    }
    
?>
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border">
                <h4 style="padding-left: 20px;" class="card-title"> Listado de Pacientes</h4>
                <br>
                <div class="col-sm-8" style="padding-left: 20px;">
                    <a type="button" class="btn btn-outline-info btn-round" href="{{ route('pacientes.create') }}" >
                        {{ __('Nuevo Paciente') }}
                    </a>
                </div>
                <ul class="nav nav-tabs" style="padding: 20px;">
                    <li><a class="nav-link btn-outline-info border" id="tabvistas" data-toggle="tab" href="#vistas">Vista</a></li>
                    <li><a class="nav-link btn-outline-info border" id="tabtablas" data-toggle="tab" href="#tablas">Tabla</a></li>
                </ul>
                <div style="padding: 20px;" class="tab-content">
                    
                    <div style="padding: 20px;" id="tablas" class=" tab-pane fade border">
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
                                                        <td><?php cambio($paciente->sexo) ?></td>
                                                        <td>{{$paciente->telefono}}</td>
                                                        <td>{{$paciente->email}}</td>
                                                        <td>{{$paciente->mediconomb}} {{$paciente->medicoapell}}</td>
                                                        <td class="td-actions text-center">
                                                        @if(auth()->user()->tipo != "secretario")
                                                            <a href="{{url('/pacientes/'.$paciente->id.'/edit')}}" rel="tooltip"  class="btn btn-outline-warning btn-square btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                                        @endif
                                                            <a href="{{url('/pacientes/'.$paciente->id.'/profile')}}" rel="tooltip"  class="btn btn-outline-info btn-square btn-icon"><i class="now-ui-icons users_single-02"></i></a>
                                                        @if(auth()->user()->tipo != "secretario")
                                                            <!--Eliminar empleado (icono)-->
                                                            <form action="{{url('/pacientes/'.$paciente->id)}}" method="POST">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                                <button onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-outline-danger btn-square btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                                            </form>
                                                        @endif
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
                    <div style="display:flex;" id="vistas" class="tab-pane fade row">
                    @foreach($datos as $paciente)
                        <!--<div class="card" style="width:380px;padding: 20px;">
                            <img class="card-img-top" src="../img/paciente.png" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">{{$paciente->nombre}}</h4>
                                <p class="card-subtitle mb-2 text-muted"><b>Médico:</b> {{$paciente->mediconomb}} {{$paciente->medicoapell}}</p>
                                <p class="card-text"><b>Sexo:</b> {{$paciente->sexo}}</p>
                                <p class="card-text"><b>Email:</b> {{$paciente->email}}</p>
                                <p class="card-text"><b>Teléfono:</b> {{$paciente->telefono}}</p>
                                <br>
                                <div class="td-actions text-center">
                                    <a href="{{url('/pacientes/'.$paciente->id.'/edit')}}" rel="tooltip"  class="btn btn-warning btn-round btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                    <a href="{{url('/pacientes/'.$paciente->id.'/profile')}}" rel="tooltip"  class="btn btn-info btn-round btn-icon"><i class="now-ui-icons users_single-02"></i></a>
                                    
                                    <form action="{{url('/pacientes/'.$paciente->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-danger btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>-->
                        <div class="col-md-3">
                        <div class="card card-user">
                        <div class="image">
                            <img src="{{asset('assets')}}/img/medical5.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="author">
                                <img class="image border-gray" src="{{asset('assets')}}/img/paciente.png" alt="...">
                                <h4 style="color: rgba(5, 101, 145, 0.9);" class="card-title">{{$paciente->nombre}} {{$paciente->apellidos}}</h4>
                                <div >
                                <p class="description"><b>Médico:</b> {{$paciente->mediconomb}} {{$paciente->medicoapell}}</p>
                                <p class="description"><b>Sexo:</b> <?php cambio($paciente->sexo) ?></p>
                                <p class="description"><b>Email:</b> {{$paciente->email}}</p>
                                <p class="description"><b>Teléfono:</b> {{$paciente->telefono}}</p>
                            </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="button-container">
                        @if(auth()->user()->tipo != "secretario")
                            <a href="{{url('/pacientes/'.$paciente->id.'/edit')}}" rel="tooltip"  class="btn btn-outline-warning btn-square btn-icon "><i class="now-ui-icons ui-2_settings-90"></i></a>
                        @endif
                            <a href="{{url('/pacientes/'.$paciente->id.'/profile')}}" rel="tooltip"  class="btn btn-outline-info btn-square btn-icon"><i class="now-ui-icons users_single-02"></i></a>
                            @if(auth()->user()->tipo != "secretario")
                            <form action="{{url('/pacientes/'.$paciente->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-outline-danger btn-square btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                            </form>
                            @endif
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


