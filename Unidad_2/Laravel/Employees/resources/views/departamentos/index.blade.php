@extends('layouts.app')
@section ('titulo', 'Administración de departamentos')
@section('read_dep')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listado de Departamentos') }}</div>
                <br>
                <div class="col-sm-8" style="padding-left: 30px;">
                    <a type="button" class="btn btn btn-outline-dark btn-sm" href="{{ route('departamentos.create') }}" >
                        {{ __('Nuevo Departamento') }}
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
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($datos as $departamento)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$departamento->nombre}}</td>
                                                <td>{{$departamento->tipo}}</td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <a href="{{url('/departamentos/'.$departamento->id.'/edit')}}" style="padding: 5px;" class = "btn btn-secondary"><i data-feather="edit"></i></a>
                                                        <!--Eliminar empleado (icono)-->
                                                        <form action="{{url('/departamentos/'.$departamento->id)}}" method="POST">
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
