<?php

namespace App\Services;

use App\Models\Permissions\Role;
use App\Models\Permissions\Permission;

use App\Http\Requests\RoleRequest;

class RoleService 
{
    protected $model;
    public function __construct()
    {
        $this->rol = new Role;
        $this->permission = new Permission;
    }
    //queries
    public function getPermission()
    {
        return $this->permission->orderBy('id')->get();
    }
    public function getRol()
    {
        return $this->rol->orderBy('id')->get();
    }
    public function findRol($id)
    {
        return $this->rol->findOrFail($id);
    }
    //save in array
    public function savePermission($role)
    {
        $permission_role = [];
        foreach ($role->permissions as $permission) {
            $permission_role[] = $permission->id;
        }
        return $permission_role;
    }
    public function index()
    {
        return $this->getRol();
    }
    public function store(RoleRequest $request)
    {
        return  $this->rol->create($request->all());
    }
    public function assignRolPermission($request, $id)
    {
        $role = $this->findRol($id);
        $role->permissions()->sync($request->get('permission'));
    }
    public function edit($role)
    {
        return $this->getPermission();
    }
    public function update(RoleRequest $request, $id)
    {
        $role = $this->findRol($id);
        $role->update($request->all());
    }
    public function show($role)
    {
        return $this->getPermission();
    }
}
