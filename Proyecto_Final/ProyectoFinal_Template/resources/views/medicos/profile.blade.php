@extends('layouts.app', [
    'namePage' => 'medicos',
    'class' => 'sidebar-mini',
    'activePage' => 'medicos',
])
@section ('titulo', 'Administración de Medicos')
@section('content')
@guest
@else
<style>
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
<?php
    $val;
    function cambio($sexo){
        if($sexo=="masculino"){
            echo "Hombre";
        }else if($sexo=="femenino"){
            echo "Mujer";
        }else if($sexo=="no especificado"){
            echo "No especificado";
        }
    }
    
?>
</style>
<div class="panel-header panel-header-sm">
  </div>
<div class="content">
<div class="card emp-profile">
            <!--<form method="post">-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img style="width: 50%;" src="{{asset('assets')}}/img/medico.png" alt=""/>
                            <!--<div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                
                                    <h5>
                                        {{$datos->name}} {{$datos->apellidos}}
                                    </h5>
                                    
                                
                                    <p class="proile-rating">No. de Pacientes : <span>{{$numpac}}</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a style="color: rgba(5, 101, 145, 0.9);" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: rgba(5, 101, 145, 0.9);" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Específicos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                    
                        <!--Valida si existen datos con ese paciente-->
                        @if(!$newdatos)
                            <!--<input type="submit" class="profile-edit-btn" name="btnAddMore" value="Añadir Datos" href="{{ route('pacientes.create') }}"/>-->
                            <a type="button" class=" btn-outline-info " href="{{url('/medicos/'.$datos->id.'/createDatos') }}" >{{ __('Añadir Datos') }}</a>
                        @else
                            
                        @endif
                   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!--<div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>-->
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="content">
                                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>ID</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$datos->id}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombre</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$datos->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Apellidos</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$datos->apellidos}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sexo</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{cambio($datos->sexo)}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Teléfono</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$datos->telefono}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$datos->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tipo</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$datos->tipo}}</p>
                                            </div>
                                        </div>
                                
                            </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="content">
                                <form method="post" action="{{url('/medicos/'.$datos->id.'/updateDatos')}}">
                                {{csrf_field()}}
                                {{method_field('PATCH')}} 
                                @foreach($datosServ as $serv)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombre</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input style="width: 30%;" id="nombre" class="form-control" name="nombre" value="{{$serv->nombre}}" type="text" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Descripcion</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input style="width: 30%;" id="descripcion" class="form-control" name="descripcion" value="{{$serv->descripcion}}" type="text" required>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                @if($newdatos)
                                    <hr>
                                    <button type="submit" class="btn btn-outline-warning btn-round">Actualizar</button>
                                @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--</form>-->           
        </div>
</div>
@endguest
@endsection
