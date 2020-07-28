@extends('layouts.app', [
    'namePage' => 'medicos',
    'class' => 'sidebar-mini',
    'activePage' => 'medicos',
])
@section ('titulo', 'Administración de medicos')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 style="padding-left: 20px;" class="card-title"> Listado de Médicos</h4>
                <br>
                <div class="col-sm-8" style="padding-left: 20px;">
                    <a type="button" class="btn btn-outline-info btn-round" href="{{ route('medicos.create') }}" >
                        {{ __('Nuevo Médico') }}
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
                                                        <td class="td-actions text-center">
                                                            <a href="{{url('/medicos/'.$medico->id.'/edit')}}" rel="tooltip"  class="btn btn-outline-warning btn-round btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                                            <a href="{{url('/medicos/'.$medico->id.'/profile')}}" rel="tooltip"  class="btn btn-outline-info btn-round btn-icon"><i class="now-ui-icons users_single-02"></i></a>
                                                            <!--Eliminar empleado (icono)-->
                                                            <form action="{{url('/medicos/'.$medico->id)}}" method="POST">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                                <button style="padding: 5px;" onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-outline-danger btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
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
                    @foreach($datos as $medico)
                        <!--<div class="card" style="width:380px;padding: 20px;">
                            <img class="card-img-top" src="../img/medico.png" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">{{$medico->nombre}}</h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{$medico->tipo}}</h6>
                                <p class="card-text"><b>Sexo:</b> {{$medico->sexo}}</p>
                                <p class="card-text"><b>Email:</b> {{$medico->email}}</p>
                                <p class="card-text"><b>Teléfono:</b> {{$medico->telefono}}</p>
                                <br>
                                <div class="td-actions text-center">
                                    <a href="{{url('/medicos/'.$medico->id.'/edit')}}" rel="tooltip"  class="btn btn-warning btn-round btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                    <a href="{{url('/medicos/'.$medico->id.'/profile')}}" rel="tooltip"  class="btn btn-info btn-round btn-icon"><i class="now-ui-icons users_single-02"></i></a>
                                    <form action="{{url('/medicos/'.$medico->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button style="padding: 5px;" onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-danger btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>-->
                        <div class="col-md-4">
                        <div class="card card-user">
                        <div class="image">
                            <img src="{{asset('assets')}}/img/medical4.jpeg" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="author">
                                <img class="avatar border-gray" src="{{asset('assets')}}/img/medico.png" alt="...">
                                <h4 style="color: rgba(5, 101, 145, 0.9);" class="card-title">{{$medico->nombre}}</h4>
                                <div >
                                <p class="description"><b>{{$medico->tipo}}</b></p>
                                <p class="description"><b>Sexo:</b> {{$medico->sexo}}</p>
                                <p class="description"><b>Email:</b> {{$medico->email}}</p>
                                <p class="description"><b>Teléfono:</b> {{$medico->telefono}}</p>
                            </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="button-container">
                            <a href="{{url('/medicos/'.$medico->id.'/edit')}}" rel="tooltip"  class="btn btn-outline-warning btn-round btn-icon "><i class="now-ui-icons ui-2_settings-90"></i></a>
                            <a href="{{url('/medicos/'.$medico->id.'/profile')}}" rel="tooltip"  class="btn btn-outline-info btn-round btn-icon"><i class="now-ui-icons users_single-02"></i></a>
                            <form action="{{url('/medicos/'.$medico->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button onclick="return confirm('¿Borrar?');" rel="tooltip" class="btn btn-outline-danger btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
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
  /*  $(document).ready(function(){
    function btneliminar(){
        //alert("asies");
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Estás Seguro?',
        text: "No podras revertirlo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, borrar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: false
        }).then((result) => {
        if (result.value) {
            swalWithBootstrapButtons.fire(
            'Eliminado!',
            'Médico Eliminado.',
            'success'
            )
        } else if (
            
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelado',
            'No se elimino el médico',
            'error'
            )
        }
        })
    }
});*/

    
</script>
@endsection


