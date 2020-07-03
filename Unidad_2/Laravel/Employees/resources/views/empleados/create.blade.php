@extends('layouts.app')
@section ('titulo', 'Administración de empleados')
@section('create')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Nuevo Empleado') }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/empleados')}}">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombres'}}</label>
                            <div class="col-sm-10">
                                <input id="nombres" class="form-control" name="nombres" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Apellidos'}}</label>
                            <div class="col-sm-10">
                                <input id="apellidos" class="form-control" name="apellidos" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Cédula'}}</label>
                            <div class="col-sm-10">
                                <input id="cedula" class="form-control" name="cedula" value="" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Email'}}</label>
                            <div class="col-sm-10">
                                <input id="email" class="form-control" name="email" value="" type="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Lugar de nacimiento'}}</label>
                            <div class="col-sm-10">
                                <input id="lugar_nacimiento" class="form-control" name="lugar_nacimiento" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Sexo'}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="sexo" id="sexo">
                                    <option value="no definido">No definido</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Estado Civil'}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="estado_civil" id="estado_civil">
                                    <option value="soltero">Soltero</option>
                                    <option value="casado">Casado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Teléfono'}}</label>
                            <div class="col-sm-10">
                                <input id="telefono" class="form-control" name="telefono" value="" type="number">
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
@endsection
