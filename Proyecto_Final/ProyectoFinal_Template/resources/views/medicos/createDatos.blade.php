@extends('layouts.app', [
    'namePage' => 'medicos',
    'class' => 'sidebar-mini',
    'activePage' => 'medicos',
])
@section ('titulo', 'Registrar Médico')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Datos al Médico ') }}{{$medico->name}} {{$medico->apellidos}}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Médico'}}</label>
                            <div class="col-sm-8">
                                <input id="nombre" class="form-control" name="nombre" value="{{$medico->name}} {{$medico->apellidos}}" type="text" disabled>
                            </div>
                        </div>
                    <form method="post" action="{{url('/medicos/'.$id.'/storeDatos')}}">
                    {{csrf_field()}}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombre del Servicio'}}</label>
                            <div class="col-sm-8">
                                <input id="nombre" placeholder="" class="form-control" name="nombre" value="" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Descripción'}}</label>
                            <div class="col-sm-8">
                                <input id="descripcion" placeholder="" class="form-control" name="descripcion" value="" type="text" required>
                            </div>
                        </div>

                        <div style="display: none;" class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Id Medico'}}</label>
                            <div class="col-sm-8">
                                <input id="id_medico" class="form-control" name="id_medico" value="{{$medico->id}}" type="text" >
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
