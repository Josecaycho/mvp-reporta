<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends AdminController
{
    public function index(Request $request)
    {
        if($asc = Input::get('asec')){
            $users = User::where('name', 'LIKE', '%' . Input::get('q') . '%')
                        ->orWhere('email', 'LIKE', '%' . Input::get('q') . '%')
                        ->orderBy('name','asc')
                        ->paginate(10);    
        }else{
            $users = User::where('name', 'LIKE', '%' . Input::get('q') . '%')->orWhere('email', 'LIKE', '%' . Input::get('q') . '%')->paginate(10);
        }
        
        $q = Input::get('q');

      return view('admin.user.index',compact('users', 'q' ,'asc'));
    }

    public function create()
    {
      return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate(request() ,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'role' => 'required|string',
            'password' => 'required'
        ]);
        
        $current_user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'role' => request('role'),
            'accepted' => 1,
            'password' => bcrypt(request('password'))
        ]);
        
        return redirect('admin/users')->with('status', 'Se creo correctamente!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        if (request('password')) {
            $user->password = bcrypt(request('password'));
        }

        $user->name = request('name');
        $user->email = request('email');
        $user->role = request('role');
        $user->accepted = 1;
        $user->save();

        return redirect('admin/users')->with('status', 'Se modificó correctamente');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/users')->with('status', 'Se elimino correctamente!');
    }

    public function accept(User $user)
    {
        $user->accepted = 1;
        $user->save();
        return redirect('/admin/users')->with('status', 'Se aprobó el usuario!');
    }
}