@extends('admin.layout.master')

@section('content')


    <div class="row">

        @if (session('status'))
            <div class="box box-warning pull-left fixing-top">
                <div class="box-header">
                    <div class="width-full pull-left">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" data-background-color="blue">
                        <div class="col-sm-12">
                            <div class="card">                                
                                <h3 class="page-heading mb-4">Usuarios - Creación</h3>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <form accept-charset="utf-8" class="forms-sample" id="user-client-create" files="true" method="POST" action="{{ route('admin.users.store') }}">
                            @csrf
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control p-input" placeholder="Ingrese un valor ..." name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control p-input" placeholder="Ingrese un valor ..." name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control p-input" placeholder="Ingrese un valor ..." name="password">
                        </div>
                        <div class="form-group">
                            <label for="role">Rol</label>
                            <select class="form-control p-input" name="role">
                                <option value="Colaborador">Colaborador</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn-primary btn" type="submit"><i class="fa fa-floppy-o"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

