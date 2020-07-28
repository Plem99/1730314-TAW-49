@extends('layouts.app', [
    'namePage' => 'citas',
    'class' => 'sidebar-mini',
    'activePage' => 'citas',
])
@section ('titulo', 'Administración de citas')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 style="padding: 20px;" class="card-title"> Listado de Citas</h4>
                <br>
                <div class="col-sm-8" style="padding-left: 20px;">
                    <a type="button" class="btn btn-outline-info btn-round" href="{{ route('citas.create') }}" >
                        {{ __('Nueva Cita') }}
                    </a>
                </div>
                <ul class="nav nav-tabs" style="padding: 20px;">
                    <li><a class="nav-link btn-outline-info border" id="tabvistas" data-toggle="tab" href="#vistas">Vista</a></li>
                    <li><a class="nav-link btn-outline-info border" id="tabtablas" data-toggle="tab" href="#tablas">Tabla</a></li>
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
                                                    <th>Nombre</th>
                                                    <th>Fecha</th>
                                                    <th>Paciente</th>
                                                    <th>Médico</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($datos as $cita)
                                                    <tr>
                                                        {{--_create_empleados_table--}}
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$cita->nombre}}</td>
                                                        <td>{{$cita->fecha}}</td>
                                                        <td>{{$cita->paciente}}</td>
                                                        <td>{{$cita->medico}}</td>
                                                        <td style="display: flex;">
                                                            <a href="{{url('/citas/'.$cita->id.'/edit')}}" rel="tooltip"  class="btn btn-warning btn-round btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                                            <!--Eliminar empleado (icono)-->
                                                            <form action="{{url('/citas/'.$cita->id)}}" method="POST">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                                <button onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-danger btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                                            </form>
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
                    <div style="padding: 20px;display:flex;" id="vistas" class="tab-pane fade row">
                    @foreach($datos as $citas)
                        <!--Grid row-->
                        <div class="col-md-6 mb-4">

                        <!--Grid column-->
                        <div class="col-md-12">

                        <!-- Card -->
                        <div class="card gradient-card">

                            <div class="card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg)">

                                <!-- Content -->
                                <a href="#!">
                                <div class="text-white d-flex h-100 mask blue-gradient-rgba">
                                    <div class="first-content align-self-center p-3">
                                    <h3 class="card-title">Cita {{$loop->iteration}}</h3>
                                    </div>
                                    <div class="second-content align-self-center mx-auto text-center">
                                    <i class="far fa-money-bill-alt fa-3x"></i>
                                    </div>
                                </div>
                                </a>

                            </div>

                            <!-- Data -->
                            <div class="third-content ml-auto mr-4 mb-2">
                                <p class="text-uppercase text-muted">{{$citas->fecha}}</p>
                                <h4 class="font-weight-bold float-right">Paciente: {{$citas->paciente}}</h4>
                            </div>

                            <!-- Content -->
                            <div class="card-body white">
                                <div class="progress md-progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted">Médico: {{$citas->medico}}</p>
                                <h4 class="text-uppercase font-weight-bold my-4">Nombre: {{$citas->nombre}}</h4>
                                <p class="text-muted" align="justify">Cualquier duda favor de consultarlo con el médico a cargo, de ser posible llamar a su número teléfonico.</p>
                                <div style="display: flex;">
                                    <a href="{{url('/citas/'.$cita->id.'/edit')}}" rel="tooltip"  class="btn btn-warning btn-round btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                    <!--Eliminar empleado (icono)-->
                                    <form action="{{url('/citas/'.$cita->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-danger btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- Card -->

                        </div>
                        <!--Grid column-->
                        </div>
                        <!--Grid row-->
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


