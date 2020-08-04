@extends('layouts.app', [
    'namePage' => 'consultas',
    'class' => 'sidebar-mini',
    'activePage' => 'consultas',
])
@section ('titulo', 'Administración de consultas')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar '.$consultas->descripcion) }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/consultas/'.$consultas->id)}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombres'}}</label>
                            <div class="col-sm-8">
                                <input id="descripcion" class="form-control" name="nombre" value="{{$consultas->descripcion}}" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Fecha'}}</label>
                            <div class="col-sm-6">
                                <input id="fecha" class="form-control" name="fecha" value="{{$consultas->fecha}}" type="datetime-local" required>
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
                    </form>
                    <div class="card-header">{{ __('Agregar Alergias al Paciente') }}</div>
                </div>

                

                <div class="col-md-6">
                <div class="card-body">
                <div class="table-responsive">
              <table class="table">
                <thead class=" text-warning">
                  <th>Nombre</th>
                  <th>Descripcion</th>
                </thead>
                <tbody>
                  @foreach($alergias as $alergia)
                    <tr>
                      <td>{{$alergia->nombre}}</td>
                      <td>{{$alergia->descripcion}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            </div>
            </div>
            <!--<form method="post" action="">-->
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                <div class="form-group ">
                    <br>
                    <br>
                    <div class="col-sm-12">
                        <select class="form-control" name="id_paciente" id="id_paciente">
                            @foreach($alergias as $alergia)
                            <option value="{{$alergia->id}}">{{$alergia->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            <button type="submit" class="btn btn-outline-success btn-round">+</button>
            <!--</form>-->
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection
