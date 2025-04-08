@extends('layouts.appRegister')

@section('content')

    <!-- begin register-header -->
    <h1 class="register-header">
        Registro
        <small>Ingresa tus datos para crear tu cuenta.</small>
    </h1>
    <!-- end register-header -->
    <!-- begin register-content -->
    <div class="register-content">
        <form action="{{ route('register') }}" method="POST" class="margin-bottom-0">
            {{ csrf_field() }}

            <label for="name" class="control-label">Nombre <span class="text-danger">*</span></label>
            <div class="row row-space-10{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="col-md-12 m-b-15">
                    <input id="name" type="text" class="form-control" placeholder="Nombre Completo" name="name" value="{{ old('name') }}" required autofocus />
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <label for="email" class="control-label">Correo <span class="text-danger">*</span></label>
            <div class="row m-b-15{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" placeholder="Correo" name="email" value="{{ old('email') }}" required />
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <label for="password" class="control-label">Contraseña <span class="text-danger">*</span></label>
            <div class="row m-b-15{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password" required />
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <label for="password-confirm" class="control-label">Confirmar Contraseña <span class="text-danger">*</span></label>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required />
                </div>
            </div>

            <div class="register-buttons">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Registrarme</button>
            </div>

            <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                ¿Ya estas registrado? Click <a href="{{ route('login') }}">Aqui</a> para ingresar.
            </div>
            <hr />
            <p class="text-center">
                &copy; All Right Reserved 2017
            </p>
        </form>
    </div>
    <!-- end register-content -->

@endsection
