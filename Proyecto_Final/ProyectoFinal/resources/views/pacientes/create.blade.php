@extends('layouts.app')
@section ('titulo', 'Registrar Paciente')
@section('create_paciente')
@guest
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Nuevo Paciente') }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/pacientes')}}">
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
                            <label class="col-sm-2 col-form-label">{{'Sexo'}}</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="sexo" id="sexo">
                                <option value="no especificado">No Especificado</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Telefono'}}</label>
                            <div class="col-sm-8">
                                <input id="telefono" class="form-control" name="telefono" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Email'}}</label>
                            <div class="col-sm-8">
                                <input id="email" class="form-control" name="email" value="" type="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Médico'}}</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="id_medico" id="id_medico">
                                @foreach($medicos as $medico)
                                    <option value="{{$medico->id}}">{{$medico->nombre}}</option>
                                @endforeach
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
