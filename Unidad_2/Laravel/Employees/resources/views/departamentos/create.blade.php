@extends('layouts.app')
@section ('titulo', 'Administración de departamentos')
@section('create_dep')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Nuevo Empleado') }}</div>
                <div class = "card-body">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="post" action="{{url('/departamentos')}}">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Nombre'}}</label>
                            <div class="col-sm-10">
                                <input id="nombres" class="form-control" name="nombre" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{'Tipo'}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="informatica">Informatica</option>
                                    <option value="recursos humanos">Recursos Humanos</option>
                                    <option value="comunicacion">Comunicacion</option>
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
@endsection
