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
                        <div class="col-sm-6">
                            <div class="card">                                
                                <h3 class="page-heading mb-4">Usuarios</h3>                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <a class="btn btn-warning btn-rigth" href="{{ route('admin.users.create') }}"><i class="fa fa-plus-circle icon-new"></i>NUEVO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('admin/users') }}">
                        <div class="form-group"></div>
                        <div class="form-group space-search">
                            <input class="form-control imput-search" name="q" type="text" value="{{ $q }}">
                            <button class="btn btn-info btn-search" type="submit" style="float:right">
                                <i aria-hidden="true" class="fa fa-search"></i>
                            </button>
                            @if ($q)
                                <a class="btn btn-danger btn-lmp" title="Editar" href="{{ url('admin/users') }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                    
                    <div class="table-responsive">
                        <table class="table table-hover center-aligned-table">
                            <thead>
                                <tr class="text-primary">
                                    <th>Nombre</th>                                       
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            @if (Auth::user()->role == 'Administrador')
                                                <a class="btn btn-success" title="Editar" href="{{ route('admin.users.show', $user->id) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endif
                                            @if (Auth::user()->email != $user->email && Auth::user()->role == 'Administrador' && $user->role != 'Administrador')
                                                <form style="display:inline-block" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-xs btn-danger btn-top" type="submit"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            @endif
                                            @if (!$user->accepted)
                                                <a href="{{ route('admin.users.accept', $user->id) }}" class="btn btn-primary" title="Aprobar" type="submit">
                                                    <i class="fa fa-check-square"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $users->appends(\Request::only('q'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
               
@endsection