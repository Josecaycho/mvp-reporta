@extends('auth.layouts.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 ctn-1" style="background-image: url({{ asset('../img/login/img-1.png') }});">
                <div class="ctn-1-1">
                    <img class="img-fluid" src="{{ asset('img/login/logo.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 ctn-2">
                <ul class="consu-register">
                    <li>
                        <a href="{{ url('register') }}">Regístrate</a>
                    </li>
                </ul>
                <div class="ctn-2-1">
                    <form action="{{ route('admin.login.authenticate') }}" method="POST">
                        @csrf
                        @if (session('status'))
                            <label class="control-label">
                                {{ session('status') }}
                            </label>
                        @endif  
                        <h2>Login</h2>
                        <div class="ctn-2-1-1 col-md-8 offset-md-2">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Correo</label>                                
                                    <input type="email" class="form-control p_input{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" id="password-field" class="form-control p_input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="Ingresa tu contraseña" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa tu contraseña"> -->
                                </div>
                                <div class="form-group ingresar">
                                    <input type="submit" class="btn btn-primary" value="Ingresar" required>
                                </div>
                                <div class="link col-12 col-md-12 .col-lg-12">
                                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña? Recupérala</a>
                                </div>
                                <div class="link col-12 col-md-12 .col-lg-12">
                                    <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia Sesión</a>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection