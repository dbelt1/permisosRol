<?php

namespace App\Http\Controllers;

use App\User;
use App\policies\UserPolicy;
use App\Models\Permissions\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    
    public function index()
    {
        $this->authorize('haveaccess','user.index');
        $users = User::with('roles')->orderBy('id','Desc')->paginate(2);
        return view ('user.index',compact('users'));
    }

    
    public function create()
    {
        $this->authorize('create',User::class);
        return view('user.create');
    }

  
    public function store(Request $request)
    {
        $this->authorize('haveaccess','user.index');
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50|unique:users,email',
            'password' => 'required'
        ]);

        $user = User::create($request->all());
        return redirect()->route('user.index')->with('status_success','User saved succesfully');
    }

    public function show(User $user)
    {
        $this->authorize('view',[$user,['user.show','userown.show']]);

        $roles = Role::orderBy('name')->get();
        return view('user.view',compact('user','roles'));
    }

    public function edit(User $user)
    {
        $this->authorize('update',[$user,['user.edit','userown.edit']]);
        $roles= Role::orderBy('name')->get();
        return view('user.edit',compact('roles','user'));
    }
  
    public function update(Request $request, User $user)
    {
        $this->authorize('update',$user);
        $request->validate([
            'name' => 'required|max:50,'.$user->id,
            'email' => 'sometimes|required|unique:users,email,'.$user->id,
            'password' => 'required'
        ]);
        $user->roles()->sync($request->get('roles'));
        $user->update($request->all());
        return redirect()->route('user.index')->with('status_success','User updated succesfully');
    }

    public function destroy(User $user)
    {
        $this->authorize('haveaccess','user.delete');
        $user->delete();
        return redirect()->route('user.index')->with('status_succes','User deleted succesfully');
    }
}
