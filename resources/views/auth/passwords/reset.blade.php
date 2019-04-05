
@extends('auth.layouts.layout')

@section('content')

<div class="container-scroller">
        <div class="container-fluid">
          <div class="row">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
              <div class="card mx-auto card-break">
                <div class="card-body px-3 py-3">
                    @if (session('status'))
                        <label class="control-label">
                            {{ session('status') }}
                        </label>
                    @endif
                  <h3 class="card-title text-center mb-3">RECETEAR CONTRASEÑA</h3>
                  <form method="POST" action="{{ route('admin.password.updated') }}">
                        @csrf
                    <div class="form-group">
                      <input type="email" class="form-control p_input" placeholder="Email" name="email" value="{{ $user->email ?? old('email') }}" readonly required>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control p_input" placeholder="Contraseña" name="password" required autofocus>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control p_input" placeholder="Repetir Contraseña" name="password_confirmation" required autofocus>
                    </div>                    

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block enter-btn">RESETEAR</button>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection