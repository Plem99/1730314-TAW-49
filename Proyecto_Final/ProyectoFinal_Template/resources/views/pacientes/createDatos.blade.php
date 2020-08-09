@extends('layouts.app', [
    'namePage' => 'pacientes',
    'class' => 'sidebar-mini',
    'activePage' => 'pacientes',
])
@section ('titulo', 'Registrar Paciente')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Datos al Paciente ') }}{{$paciente->nombre}} {{$paciente->apellidos}}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Paciente'}}</label>
                            <div class="col-sm-8">
                                <input id="nombre" class="form-control" name="nombre" value="{{$paciente->nombre}} {{$paciente->apellidos}}" type="text" disabled>
                            </div>
                        </div>
                    <form method="post" action="{{url('/pacientes/'.$id.'/storeDatos')}}">
                    {{csrf_field()}}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Peso (ejemplo: 80)'}}</label>
                            <div class="col-sm-8">
                                <input id="peso" placeholder="KG" class="form-control" name="peso" value="" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Estatura (ejemplo: 1.80)'}}</label>
                            <div class="col-sm-8">
                                <input id="estatura" placeholder="Mts" class="form-control" name="estatura" value="" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Indice de Masa Corporal (ejemplo: 2.64)'}}</label>
                            <div class="col-sm-8">
                                <input id="imc" class="form-control" name="imc" value="" type="text" required>
                            </div>
                        </div>

                        <div style="display: none;" class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Id Paciente'}}</label>
                            <div class="col-sm-8">
                                <input id="id_paciente" class="form-control" name="id_paciente" value="{{$paciente->id}}" type="text" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Tipo de Sangre'}}</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="id_tipo_sangre" id="id_tipo_sangre">
                                @foreach($tiposangres as $tiposangre)
                                    <option value="{{$tiposangre->id}}">{{$tiposangre->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="half-rule"/>
                        <button type="submit" class="btn btn btn-outline-success btn-round">Registrar</button>
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
