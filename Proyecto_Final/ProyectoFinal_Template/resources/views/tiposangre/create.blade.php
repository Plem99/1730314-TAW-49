@extends('layouts.app', [
    'namePage' => 'tiposangre',
    'class' => 'sidebar-mini',
    'activePage' => 'tiposangre',
])
@section ('titulo', 'Registrar tipos de sangre')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Nuevo Tipo de Sangre') }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/tiposangre')}}">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombre'}}</label>
                            <div class="col-sm-8">
                                <input id="nombre" class="form-control" name="nombre" value="" type="text" required>
                            </div>
                        </div>

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
