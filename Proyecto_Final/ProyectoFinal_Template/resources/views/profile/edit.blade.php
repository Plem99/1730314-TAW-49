@extends('layouts.app', [
    'namePage' => 'Perfil',
    'class' => 'sidebar-mini',
    'activePage' => 'perfil',
])
@section('content')
@guest
@else
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4 style="padding-left: 5px;" class="card-title">{{__(" Editar Perfil")}}</h4>
          </div>
          <div style="padding-left: 20px;" class="card-body">
            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Nombre")}}</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label>{{'Apellidos'}}</label>
                        <input id="apellidos" class="form-control" name="apellidos" value="{{old('apellidos', auth()->user()->apellidos) }}" type="text" required disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label>{{'Sexo'}}</label>
                        <select class="form-control" value="{{old('sexo', auth()->user()->sexo)}}" name="sexo" id="sexo" disabled>
                          <option>{{auth()->user()->sexo}}</option>  
                          <option value="no especificado">No Especificado</option>
                          <option value="masculino">Masculino</option>
                          <option value="femenino">Femenino</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__(" Email")}}</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', auth()->user()->email) }}" required>
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label>{{'Telefono'}}</label>
                        <input id="telefono" class="form-control" name="telefono" value="{{old('telefono', auth()->user()->telefono)}}" type="text" required disabled>
                    </div>
                  </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn btn-outline-warning btn-round">{{__('Guardar')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
          <div class="card-header">
            <h4 style="padding-left: 5px;" class="card-title">{{__("Contraseña")}}</h4>
          </div>
          <div style="padding-left: 20px;"  class="card-body">
            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
              @csrf
              @method('put')
              @include('alerts.success', ['key' => 'password_status'])
              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__("Contraseña Actual")}}</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" placeholder="{{ __('Contraseña Actual') }}" type="password"  required>
                    @include('alerts.feedback', ['field' => 'old_password'])
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{__("Nueva Contraseña")}}</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nueva Contraseña') }}" type="password" name="password" required>
                    @include('alerts.feedback', ['field' => 'password'])
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-7 pr-1">
                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                  <label>{{__("Confirmar Nueva Contraseña")}}</label>
                  <input class="form-control" placeholder="{{ __('Confirmar Nueva Contraseña') }}" type="password" name="password_confirmation" required>
                </div>
              </div>
            </div> 
            <div class="card-footer ">
              <button type="submit" class="btn btn btn-outline-warning btn-round">{{__('Cambiar Contraseña')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('assets')}}/img/medical4.jpeg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
                <img class="avatar border-gray" src="{{asset('assets')}}/img/img_avatar1.png" alt="...">
                <h5 style="color: rgba(5, 101, 145, 0.9);" class="title">{{ auth()->user()->name }} {{ auth()->user()->apellidos }}</h5>
                <h6 style="color: rgba(0, 0, 0, 0.9);" class="card-title">{{ auth()->user()->tipo }}</h6>
              <p class="description">
                  {{ auth()->user()->email }}
              </p>
            </div>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i style="color: rgba(5, 101, 145, 0.9);" class="fab fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i style="color: rgba(5, 101, 145, 0.9);" class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i style="color: rgba(5, 101, 145, 0.9);" class="fab fa-google-plus-square"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endguest
@endsection