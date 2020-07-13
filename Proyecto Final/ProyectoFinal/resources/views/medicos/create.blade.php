@extends('layouts.app')
@section ('titulo', 'Registrar Médico')
@section('create_medico')
@guest
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Nuevo Médico') }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/medicos')}}">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombres'}}</label>
                            <div class="col-sm-8">
                                <input id="nombre" class="form-control" name="nombre" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Apellidos'}}</label>
                            <div class="col-sm-8">
                                <input id="apellidos" class="form-control" name="apellidos" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Email'}}</label>
                            <div class="col-sm-8">
                                <input id="email" class="form-control" name="email" value="" type="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Contraseña'}}</label>
                            <div class="col-sm-8">
                                <input id="contrasena" class="form-control" name="contrasena" value="" type="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Tipo'}}</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="administrador">Administrador</option>
                                    <option value="consultas">Consultas</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn btn-outline-success btn-sm">Registrar</button>
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
