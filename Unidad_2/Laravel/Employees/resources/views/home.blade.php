@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alumno') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--  {{ __('You are logged in!') }}  --}}
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nombre: Pedro Luis Espinoza Martinez</li>
                        <li class="list-group-item">Matricula: 1730314</li>
                        <li class="list-group-item">Clave de Grupo: ITI-07449</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
