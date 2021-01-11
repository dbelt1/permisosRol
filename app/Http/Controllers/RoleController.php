<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Permissions\Role;
use App\Models\Permissions\Permission;
use Illuminate\Support\Facades\Gate;
use App\Services\RoleService;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller

{
   protected $model;
   public function __construct()
   {
      $this->model = new RoleService;
   }
   public function index()
   {
      $this->authorize('haveaccess','rol.index');
      $roles = $this->model->index();
      return view('role.index',compact('roles'));
   }
   public function create()
   {
      $this->authorize('haveaccess', 'rol.create');
      $permissions = Permission::get();
      return view('role.create', compact('permissions'));
   }
   public function store(RoleRequest $request)
   {
      $role = $this->model->store($request);
      $this->model->assignRolPermission($request,$role->id);
      return redirect()->route('role.index')->with('status_success', 'Role saved successfully');
   }
   public function edit(Role $role)
   {
      $this->authorize('haveaccess', 'rol.edit');
      
      $permission_role = $this->model->savePermission($role);
      $permissions = $this->model->getPermission();
      $this->model->edit($role);
      return view('role.edit', compact('permissions', 'role', 'permission_role'));

   }
   public function update(RoleRequest $request, $id)
   {
      $this->authorize('haveaccess', 'rol.edit');
      $this->model->update($request,$id);
      $this->model->assignRolPermission($request,$id);
      return redirect()->route('role.index')->with('status_success', 'Role updated successfully');
   }
   public function show(Role $role)
   {
      $this->authorize('haveaccess', 'rol.show');
      $permission_role = $this->model->savePermission($role);
      $permissions = $this->model->getPermission();
      return view('role.view', compact('permissions', 'role', 'permission_role'));
   }
   public function destroy(Role $role)
   {
      $this->authorize('haveaccess', 'rol.delete');
      $role->delete();
      return redirect()->route('role.index')->with('status_success', 'Role deleted successfully');
   }
}
