@extends('layout.patron');
@section ('titulo', 'Administración de emplados');
@section ('contenido');
    <div class = "right_col" role="main">
        <div class = "">
            <div class = "page-title">
                <div class = "title_left">
                    <h3> Administración de Empleados </h3>
                </div>
            </div>
        </div>
        <div class = "clearfix"></div>
        <div class = "x_panel">
            <div class = "x_title">
                <h2> Listado de Empleados </div>
                <div class = "clearfix"></div>
            </div>
            <div class = "x_content">
                <div class = "row">
                    <div class = "row">
                        <div class = "col-sm-12">
                            <div class = "card-box table-responsive">
                                <table id="datatable-keytable" class="table  table-stripped table-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nombre(s)</th>
                                            <th>Apellidos</th>
                                            <th>Cédula</th>
                                            <th>Email</th>
                                            <th>Lugar de Nacimiento</th>
                                            <th>Sexo</th>
                                            <th>Estado Civil</th>
                                            <th>Teléfono</th>