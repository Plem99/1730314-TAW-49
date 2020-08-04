@extends('layouts.app', [
    'namePage' => 'citas',
    'class' => 'sidebar-mini',
    'activePage' => 'citas',
])
@section ('titulo', 'Administración de citas')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar '.$citas->nombre) }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/citas/'.$citas->id)}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombres'}}</label>
                            <div class="col-sm-8">
                                <input id="nombres" class="form-control" name="nombre" value="{{$citas->nombre}}" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Fecha'}}</label>
                            <div class="col-sm-6">
                                <input id="fecha" class="form-control" name="fecha" value="{{$citas->fecha}}" type="datetime-local" required>
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
