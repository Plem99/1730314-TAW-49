@extends('layouts.app', [
    'namePage' => 'tiposangre',
    'class' => 'sidebar-mini',
    'activePage' => 'tiposangre',
])
@section ('titulo', 'Administración de Tipo de sangre')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border">
                <h4 style="padding-left: 20px;" class="card-title"> Listado de Tipos de Sangre</h4>
                <br>
                <div class="col-sm-8" style="padding-left: 20px;">
                    <a type="button" class="btn btn-outline-info btn-round" href="{{ route('tiposangre.create') }}" >
                        {{ __('Nuevo Tipo de Sangre') }}
                    </a>
                </div>
                <ul class="nav nav-tabs" style="padding: 20px;">
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
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($datos as $tiposangre)
                                                    <tr>
                                                        {{--_create_empleados_table--}}
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$tiposangre->nombre}}</td>
                                                        <td style="display: flex;">
                                                            <a href="{{url('/tiposangre/'.$tiposangre->id.'/edit')}}" rel="tooltip"  class="btn btn-outline-warning btn-round btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                                            <!--Eliminar empleado (icono)-->
                                                            <form action="{{url('/tiposangre/'.$tiposangre->id)}}" method="POST">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                                <button onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-outline-danger btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endguest
<script>
    $(document).ready(function(){
        $('#tabtablas').trigger('click');
        $("#tabtablas").click(function(){
            $("#tablas").show();
            $("#vistas").hide();
        });
    });

</script>
@endsection


