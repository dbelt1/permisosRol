<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Permissions\Role;
use App\Models\Permissions\Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
   public function index(){
      $this->authorize('haveaccess','rol.index');

      $roles = Role::orderBy('id','Desc')->paginate(4);
      return view('role.index',compact('roles'));
   }
   public function create(){
      $this->authorize('haveaccess','rol.create');
      $permissions = Permission::get();
      return view('role.create',compact('permissions'));
   }
   public function store(Request $request){
      $this->authorize('haveaccess','rol.create');
      $request->validate([
         'name'          => 'required|max:50|unique:roles,name',
         'slug'          => 'required|max:50|unique:roles,slug',
         'full_access'   => 'required|in:yes,no'
     ]);

      $role = Role::create($request->all());
      // if($request->get('permission')){
         $role->permissions()->sync($request->get('permission'));
      // }
      return redirect()->route('role.index')->with('status_success','Role saved successfully');
  
   }
   public function edit(Role $role){
      $this->authorize('haveaccess','rol.edit');
      $permission_role = [];

      foreach($role->permissions as $permission ){
         $permission_role[] = $permission->id;
      }
      $permissions = Permission::get();
      return view('role.edit',compact('permissions','role','permission_role'));
   }
   public function update(Request $request,Role $role){
      $this->authorize('haveaccess','rol.edit');
      $request->validate([
         'name'          => 'required|max:50|unique:roles,name,'.$role->id,
         'slug'          => 'required|max:50|unique:roles,slug,'.$role->id,
         'full_access'   => 'required|in:yes,no'
     ]);

      $role->update($request->all());
      // if($request->get('permission')){
         $role->permissions()->sync($request->get('permission'));
      // }
      return redirect()->route('role.index')->with('status_success','Role updated successfully');
     
   }
   public function show(Role $role){
      $this->authorize('haveaccess','rol.show');
      $permission_role = [];

      foreach($role->permissions as $permission ){
         $permission_role[] = $permission->id;
      }
      $permissions = Permission::get();
      return view('role.view',compact('permissions','role','permission_role'));

   }
   public function destroy(Role $role){
      $this->authorize('haveaccess','rol.delete');
      $role->delete();
      return redirect()->route('role.index')->with('status_success','Role deleted successfully');
   }
}
