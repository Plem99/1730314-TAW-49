@extends('layouts.app', [
    'namePage' => 'tiposangre',
    'class' => 'sidebar-mini',
    'activePage' => 'tiposangre',
])
@section ('titulo', 'Administración de tipos de sangre')
@section('content')
@guest
@else
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar a '.$datos->nombre) }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/tiposangre/'.$datos->id)}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombre'}}</label>
                            <div class="col-sm-8">
                                <input id="nombre" class="form-control" name="nombre" value="{{$datos->nombre}}" type="text" required>
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
