@extends('layouts.app', [
    'namePage' => 'medicamentos',
    'class' => 'sidebar-mini',
    'activePage' => 'medicamentos',
])
@section ('titulo', 'Administración de medicamentos')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border">
                <h4 style="padding-left: 20px;" class="card-title"> Listado de Medicamentos</h4>
                <br>
                <div class="col-sm-8" style="padding-left: 20px;">
                    <a type="button" class="btn btn-outline-info btn-round" href="{{ route('medicamentos.create') }}" >
                        {{ __('Nuevo Medicamento') }}
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
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($datos as $medicamento)
                                                    <tr>
                                                        {{--_create_empleados_table--}}
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$medicamento->nombre}}</td>
                                                        <td>{{$medicamento->descripcion}}</td>
                                                        <td style="display: flex;">
                                                            <a href="{{url('/medicamentos/'.$medicamento->id.'/edit')}}" rel="tooltip"  class="btn btn-outline-warning btn-square btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                                            <!--Eliminar empleado (icono)-->
                                                            <form action="{{url('/medicamentos/'.$medicamento->id)}}" method="POST">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                                <button onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-outline-danger btn-square btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
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
                    <div style="display:flex;" id="vistas" class="tab-pane fade row">
                    @foreach($datos as $medicamento)
                        <div class="col-md-2">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('assets')}}/img/medicamentos.png" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">{{$medicamento->nombre}}</h4>
                                <p class="card-text">{{$medicamento->descripcion}}</p>
                                <hr>
                                <div style="display: flex;">
                                    <a href="{{url('/medicamentos/'.$medicamento->id.'/edit')}}" rel="tooltip"  class="btn btn-outline-warning btn-square btn-icon "><i class="now-ui-icons ui-2_settings-90"></i></a>
                                    <form action="{{url('/medicamentos/'.$medicamento->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-outline-danger btn-square btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                    </form>
                                </div>
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


