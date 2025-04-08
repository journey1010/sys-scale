@extends('layouts.appLogin')

@section('content')

    <!-- begin login-header -->
    <div class="login-header">
        <div class="brand">
            @if(config('constants.general.tema') == 1)
                <img src="{{ asset('images/login.png') }}" class="img-login"/>
                <span class=""></span>
            @elseif (config('constants.general.tema') == 2)
                <img src="{{ asset('images/uncp-login.svg') }}" class="img-login"/>
                <span class=""></span>
                {{--<span class="login-title">{{ config('constants.sistema') }}</span>--}}
            @elseif (config('constants.general.tema') == 3)
                <img src="{{ asset('images/akdemic-login.svg') }}" class="img-login"/>
                <span class=""></span>
            @elseif (config('constants.general.tema') == 4)
                <img src="{{ asset('images/unica-login.png') }}" class="img-login"/>
                <span class=""></span>
            @elseif (config('constants.general.tema') == 5)
                <img src="{{ asset('images/undac-login.png') }}" class="img-login"/>
                <span class=""></span>
            @elseif (config('constants.general.tema') == 6)
                <img src="{{ asset('images/unheval-login.png') }}" class="img-login" style="width: 300px;"/>
                <span class=""></span>
            @elseif (config('constants.general.tema') == 7)
                <img src="{{ asset('images/unfv/logo.png') }}" class="img-login" style="height: 100px; width: auto; max-width: 100%"/>
                <span class=""></span>
            @elseif (config('constants.general.tema') == 8)
                <img src="{{ asset('images/logo-upal.png') }}" class="img-login" style="height: 100px; width: auto; max-width: 100%"/>
                <span class=""></span>
            @endif


            <small>Sistema Escalafonario</small>
        </div>
        <div class="icon">
            <i class="ion-ios-locked"></i>
        </div>
    </div>
    <!-- end login-header -->
    <!-- begin login-content -->
    <div class="login-content">
        <form action="{{ route('login') }}" method="POST" class="margin-bottom-0">

            {{ csrf_field() }}

            <div class="form-group m-b-15{{ $errors->has('username') ? ' has-error' : '' }}">
                <input id="username" type="text" class="form-control input-lg" placeholder="Usuario" name="username" value="{{ old('username') }}" required autofocus />
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group m-b-15{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control input-lg" placeholder="Clave" name="password" required />
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="checkbox m-b-30">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/> Recordarme
                </label>
            </div>

            <div class="login-buttons">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Ingresar</button>
            </div>
        </form>
        <br>
        {{--<div class="text-right">
            <a href="{{ url('akdemic/login') }}" type="submit" class="btn btn-info">Ingresar con Akdemic</a>
        </div>--}}
            <div class="m-t-20 m-b-20 text-inverse">
                Si no recuerdas tu contraseña comunicate con IT Services
            </div>



            <hr />
            <p class="text-center">
                &copy; All Right Reserved 2023
            </p>


    </div>
    <!-- end login-content -->
@endsection
