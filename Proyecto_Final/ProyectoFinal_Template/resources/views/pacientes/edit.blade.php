@extends('layouts.app', [
    'namePage' => 'pacientes',
    'class' => 'sidebar-mini',
    'activePage' => 'pacientes',
])
@section ('titulo', 'Administración de pacientes')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar a '.$pacientes->nombre.' '.$pacientes->apellidos) }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/pacientes/'.$pacientes->id)}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombres'}}</label>
                            <div class="col-sm-8">
                                <input id="nombres" class="form-control" name="nombre" value="{{$pacientes->nombre}}" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Apellidos'}}</label>
                            <div class="col-sm-8">
                                <input id="apellidos" class="form-control" name="apellidos" value="{{$pacientes->apellidos}}" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Sexo'}}</label>
                            <div class="col-sm-4">
                                <select class="form-control" value="{{$pacientes->sexo}}" name="sexo" id="sexo">
                                <option value="no especificado">No Especificado</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Telefono'}}</label>
                            <div class="col-sm-8">
                                <input id="telefono" class="form-control" name="telefono" value="{{$pacientes->telefono}}" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Email'}}</label>
                            <div class="col-sm-8">
                                <input id="email" class="form-control" name="email" value="{{$pacientes->email}}" type="email" required>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Médico'}}</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="id_medico" id="id_medico">
                                @foreach($medicos as $medico)
                                    <option value="{{$medico->id}}">{{$medico->name}} {{$medico->apellidos}}</option>
                                @endforeach
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
