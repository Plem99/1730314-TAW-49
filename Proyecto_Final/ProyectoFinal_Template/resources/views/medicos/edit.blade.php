@extends('layouts.app', [
    'namePage' => 'medicos',
    'class' => 'sidebar-mini',
    'activePage' => 'medicos',
])
@section ('titulo', 'Administración de médicos')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar a '.$medicos->name.' '.$medicos->apellidos) }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/medicos/'.$medicos->id)}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombres'}}</label>
                            <div class="col-sm-8">
                                <input id="name" class="form-control" name="name" value="{{$medicos->name}}" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Apellidos'}}</label>
                            <div class="col-sm-8">
                                <input id="apellidos" class="form-control" name="apellidos" value="{{$medicos->apellidos}}" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Sexo'}}</label>
                            <div class="col-sm-4">
                                <select class="form-control" value="{{$medicos->sexo}}" name="sexo" id="sexo">
                                <option value="no especificado">No Especificado</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Email'}}</label>
                            <div class="col-sm-8">
                                <input id="email" class="form-control" name="email" value="{{$medicos->email}}" type="email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Contraseña'}}</label>
                            <div class="col-sm-8">
                                <input id="password" class="form-control" name="password" value="{{$medicos->password}}" type="password" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Telefono'}}</label>
                            <div class="col-sm-8">
                                <input id="telefono" class="form-control" name="telefono" value="{{$medicos->telefono}}" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Tipo'}}</label>
                            <div class="col-sm-4">
                                <select class="form-control" value="{{$medicos->tipo}}" name="tipo" id="tipo">
                                    <option value="superadmin">Super Administrador</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="consultas">Consultas</option>
                                    <option value="secretario">Secretario</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-warning btn-round">Actualizar</button>
                    </form>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection
