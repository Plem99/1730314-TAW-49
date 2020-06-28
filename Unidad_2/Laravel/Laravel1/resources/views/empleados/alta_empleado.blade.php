@extends('layout.patron');
@section ('titulo', 'Agregar empleados');
@section ('contenido');
<div class = "right_col" role="main">
    <div class = "">
        <div class = "page-title">
            <div class = "title_left">
                <h3> Agregar Empleados </h3>
            </div>
        </div>
    </div>
    <div class = "clearfix"></div>
    <div class = "x_panel">
        <div class = "x_title">
            <h2> Datos de Empleados </h2>
        </div>
        <div class = "clearfix"></div>
    </div>
    <div class = "x_content">
        <div class = "row">
            <div class = "row">
                <div class = "col-sm-12">
                    <form method="POST" action="{{url('/empleados')}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nombres</label>
                            <div class="col-sm-10">
                                <input id="nombres" class="form-control" name="nombres" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input id="apellidos" class="form-control" name="apellidos" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cédula</label>
                            <div class="col-sm-10">
                                <input id="cedula" class="form-control" name="cedula" value="" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input id="email" class="form-control" name="email" value="" type="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Lugar de nacimiento</label>
                            <div class="col-sm-10">
                                <input id="lugar_nacimiento" class="form-control" name="lugar_nacimiento" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sexo</label>
                            <div class="col-sm-10">
                                <input id="sexo" class="form-control" name="sexo" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Estado Civil</label>
                            <div class="col-sm-10">
                                <input id="estado_civil" class="form-control" name="estado_civil" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>Teléfono</label>
                            <div class="col-sm-10">
                                <input id="telefono" class="form-control" name="telefono" value="" type="number">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
@endsection
