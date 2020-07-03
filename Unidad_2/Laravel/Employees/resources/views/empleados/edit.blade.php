@extends('layouts.app')
@section ('titulo', 'Administración de empleados')
@section('edit')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar a '.$empleado->nombres.' '.$empleado->apellidos) }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/empleados/'.$empleado->id)}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombres'}}</label>
                            <div class="col-sm-10">
                                <input id="nombres" class="form-control" name="nombres" value="{{$empleado->nombres}}" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Apellidos'}}</label>
                            <div class="col-sm-10">
                                <input id="apellidos" class="form-control" name="apellidos" value="{{$empleado->apellidos}}" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Cédula'}}</label>
                            <div class="col-sm-10">
                                <input id="cedula" class="form-control" name="cedula" value="{{$empleado->cedula}}" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Email'}}</label>
                            <div class="col-sm-10">
                                <input id="email" class="form-control" name="email" value="{{$empleado->email}}" type="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Lugar de nacimiento'}}</label>
                            <div class="col-sm-10">
                                <input id="lugar_nacimiento" class="form-control" name="lugar_nacimiento" value="{{$empleado->lugar_nacimiento}}" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Sexo'}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" value="{{$empleado->sexo}}" name="sexo" id="sexo">
                                    <option value="no definido">No definido</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Estado Civil'}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" value="{{$empleado->estado_civil}}" name="estado_civil" id="estado_civil">
                                    <option value="soltero">Soltero</option>
                                    <option value="casado">Casado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Teléfono'}}</label>
                            <div class="col-sm-10">
                                <input id="telefono" class="form-control" name="telefono" value="{{$empleado->telefono}}" type="number">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning btn-sm">Actualizar</button>
                    </form>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
