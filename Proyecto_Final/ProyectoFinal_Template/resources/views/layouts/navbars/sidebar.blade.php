<?php
  $tipo=auth()->user()->tipo;
  //Para que solo te muestre los modulos compatibles para cada tipo de usuario
  function tipo($tipo){

    //Lo que se retornara es el valor para saber que tipo de usuario es   
    if($tipo == "superadmin"){
      return "1";
    }else if($tipo == "administrador"){
      return "2";
    }else if($tipo == "secretario"){
      return "3";
    }else if($tipo == "consultas"){
      return "4";
    }

  }
  
?>

<div class="sidebar" data-color="blue">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    style="background: linear-gradient(to right, #0c2646 0%, #204065 60%, #2a5788 100%);"
-->
  <div class="logo">
    <a href="http://www.plem.tech" class="simple-text logo-mini">
      {{ __('TAW') }}
    </a>
    <a href="http://www.plem.tech" class="simple-text logo-normal">
      {{ __('Expediente') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Inicio') }}  </p>
        </a>
      </li>
      <!--<li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="fab fa-laravel"></i>
          <p>
            {{ __("Laravel Examples") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons travel_info"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("User Management") }} </p>
              </a>
            </li>
          </ul>
        </div>-->
      
      
      <li class="@if ($activePage == 'perfil') active @endif">
        <!--<a href="{{ url('/medicos/medic_profile') }}">-->
        <a href="{{ route('profile.edit') }}">
          <i class="now-ui-icons travel_info"></i>
          <p>{{ __("Perfil") }}</p>
        </a>
      </li>
      <!--No seran visibles para medicos asociados y secretarios-->
      @if(tipo($tipo) != "3" && tipo($tipo) != "4")
      <li class="@if ($activePage == 'medicos') active @endif">
        <a href="{{ route('medicos.index') }}">
          <i class="now-ui-icons users_circle-08"></i>
          <p>{{ __('Médicos') }}</p>
        </a>
      </li>
      @endif
      <!--No seran visibles para medicos asociados-->
      @if(tipo($tipo) != "4")
      <li class="@if ($activePage == 'pacientes') active @endif">
        <a href="{{ route('pacientes.index') }}">
          <i class="now-ui-icons users_single-02"></i>
          <p>{{ __('Pacientes') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'citas') active @endif">
        <a href="{{ route('citas.index') }}">
          <i class="now-ui-icons education_agenda-bookmark"></i>
          <p>{{ __('Citas') }}</p>
        </a>
      </li>
      
      <li class="@if ($activePage == 'consultas') active @endif">
        <a href="{{ route('consultas.index') }}">
          <i class="now-ui-icons files_paper"></i>
          <p>{{ __('Consultas') }}</p>
        </a>
      </li>
      @endif
      <!--No seran visibles para medicos asociados y secretarios-->
      @if(tipo($tipo) != "3" && tipo($tipo) != "4")
      <li class="@if ($activePage == 'medicamentos') active @endif">
        <a href="{{ route('medicamentos.index') }}">
          <i class="now-ui-icons business_briefcase-24"></i>
          <p>{{ __('Medicamentos') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'alergias') active @endif">
        <a href="{{ route('alergias.index') }}">
          <i class="now-ui-icons media-2_sound-wave"></i>
          <p>{{ __('Alergias') }}</p>
        </a>
      </li>
      @endif
      <!--<li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li>-->
      <!--<li class = "@if ($activePage == 'upgrade') active @endif active-pro">
        <a href="{{ route('page.index','upgrade') }}" class="color-ev">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>-->
    </ul>
  </div>
</div>