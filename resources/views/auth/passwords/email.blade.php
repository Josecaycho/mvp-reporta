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
                  <h3 class="card-title text-center mb-3">RECUPERAR CONTRASEÑA</h3>
                  <p class="text-center text-color-root">Ingresa tu Email y las instrucciones <br> serán enviadas!</p>
                  <form method="POST" action="{{ route('admin.password.reset') }}">
                        @csrf
                    <div class="form-group">
                      <input type="email" class="form-control p_input" placeholder="Email" id="email" type="email" name="email" required>
                    </div>                 

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block enter-btn">RECUPERAR</button>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection