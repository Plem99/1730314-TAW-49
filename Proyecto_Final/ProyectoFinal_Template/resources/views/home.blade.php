@extends('layouts.app', [
    'namePage' => 'Inicio',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/medical2.jpg",
])
<?php
    function cambio($sexo){
        if($sexo=="masculino"){
            echo "Hombre";
        }else if($sexo=="femenino"){
            echo "Mujer";
        }else if($sexo=="no especificado"){
            echo "No especificado";
        }
    }

    function medicos($tipo){
        if($tipo=="superadmin"){
            echo "Super Administrador";
        }else if($tipo=="administrador"){
            echo "Médico Administrador";
        }else if($tipo=="consultas"){
            echo "Médico Asociado";
        }else if($tipo=="secretario"){
            echo "Secretario/a";
        }
    } 
?>
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<style>
  .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 250px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
  .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>
  <div class="panel-header panel-header-lg">
    <!--<canvas id="bigDashboardChart"></canvas>-->
  </div>
  <div class="content">
  <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-users"></i>
        <span class="count-numbers">{{$numMedicos}}</span>
        <span class="count-name">No. total de Médicos</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-user"></i>
        <span class="count-numbers">{{$numPacientes}}</span>
        <span class="count-name">No. total de Pacientes</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-book"></i>
        <span class="count-numbers">{{$numCitas}}</span>
        <span class="count-name">No. total de Citas</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-address-book-o"></i>
        <span class="count-numbers">{{$numConsultas}}</span>
        <span class="count-name">No. total de Consultas</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-heartbeat"></i>
        <span class="count-numbers">{{$numMedicamentos}}</span>
        <span class="count-name">No. total de Medicamentos</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-money"></i>
        <span class="count-numbers">{{$numVentas}}</span>
        <span class="count-name">No. total de Ventas</span>
      </div>
    </div>
  </div>
  <br>
  
  <hr>
  <br>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-tasks">
          <div class="card-header ">
            <h5 class="card-category">Chat entre Médicos</h5>
            <h4 class="card-title">Chat //No funcional</h4>
          </div>
          <div style="padding: 20px;" class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Médico 1</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Saludos
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Médico 2</strong>
                                </div>
                                <p>
                                    ¿Como se ha comportado el paciente?
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Médico 1</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                </div>
                                <p>
                                El paciente se comporto de una manera correcta.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Médico 2</strong>
                                </div>
                                <p>
                                    Buenas noticias!
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div style="padding: 20px;" class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Escribe un mensaje..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">Lista de todos los administradores</h5>
            <h4 class="card-title"> Administradores</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Sexo</th>
                  <th>Email</th>
                  <th>Tipo</th>
                </thead>
                <tbody>
                  @foreach($datos as $admin)
                    <tr>
                      <td>{{$admin->name}}</td>
                      <td>{{$admin->apellidos}}</td>
                      <td><?php cambio($admin->sexo)?></td>
                      <td>{{$admin->email}}</td>
                      <td><?php medicos($admin->tipo)?> </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush