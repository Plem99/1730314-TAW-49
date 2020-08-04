@extends('layouts.app', [
    'namePage' => 'consultas',
    'class' => 'sidebar-mini',
    'activePage' => 'consultas',
])
@section ('titulo', 'Registrar Nueva Consulta')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Nueva Consulta') }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/consultas')}}">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Descripcion'}}</label>
                            <div class="col-sm-8">
                                <input id="descripcion" class="form-control" name="descripcion" value="" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Fecha'}}</label>
                            <div class="col-sm-6">
                                <input id="fecha" class="form-control" name="fecha" value="" type="datetime-local" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Paciente'}}</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="id_paciente" id="id_paciente">
                                @foreach($pacientes as $paciente)
                                    <option value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->apellidos}}</option>
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
