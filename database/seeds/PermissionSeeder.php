<?php

use Illuminate\Database\Seeder;
use App\Models\Permissions\Permission;
use App\Models\Permissions\Role;
use App\User;

class PermissionSeeder extends Seeder
{
    
    public function run()
    {
        $userAdmin = User::where('email','admin@admin.com')->first();
        if($userAdmin){
            $userAdmin->delete();
        }

        $userAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),

        ]);
        //rol user
        $roladmin =  Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'description'=>'administrator',
            'full_access'=>'yes'
        ]);

        $roluser =  Role::create([
            'name'=>'Registered User',
            'slug'=>'registereduser',
            'description'=>'Registered User',
            'full_access'=>'no'
        ]);


        //table rol user
        $userAdmin->roles()->sync([$roladmin->id]);

        //permission
        $permission_all = [];

        //permission of rols
        $permission = Permission::create([
            'name'=>'Index Role',
            'slug'=>'rol.index',
            'description'=>'User can list rol'
        ]);
        $permission_all[] = $permission->id; 

        $permission = Permission::create([
                'name'=>'Show Role',
                'slug'=>'rol.show',
                'description'=>'User can show rol'
            ]);
        $permission_all[] = $permission->id; 

        $permission = Permission::create([
                'name'=>'Create Role',
                'slug'=>'rol.create',
                'description'=>'User can create rol'
            ]);
        $permission_all[] = $permission->id; 

        $permission = Permission::create([
                'name'=>'Edit Role',
                'slug'=>'rol.edit',
                'description'=>'User can edit rol'
            ]);
        $permission_all[] = $permission->id; 

        $permission = Permission::create([
                'name'=>'Delete Role',
                'slug'=>'rol.delete',
                'description'=>'User can delete rol'
            ]);
        $permission_all[] = $permission->id; 


        //table permission rol
        $roladmin->permissions()->sync($permission_all);

        //permission of users

        $permission = Permission::create([
            'name'=>'Index User',
            'slug'=>'user.index',
            'description'=>'User can list user'
        ]);
        $permission_all[] = $permission->id; 

        $permission = Permission::create([
            'name'=>'Show User',
            'slug'=>'user.show',
            'description'=>'User can show user'
        ]);
        $permission_all[] = $permission->id; 

        $permission = Permission::create([
            'name'=>'Edit User',
            'slug'=>'user.edit',
            'description'=>'User can edit user'
        ]);
        $permission_all[] = $permission->id; 
        
        $permission = Permission::create([
            'name'=>'Show Own User',
            'slug'=>'userown.show',
            'description'=>'User can show own user'
        ]);
        $permission_all[] = $permission->id; 

        $permission = Permission::create([
            'name'=>'Edit Own User',
            'slug'=>'userown.edit',
            'description'=>'User can edit own user'
        ]);
        $permission_all[] = $permission->id; 

        $permission = Permission::create([
            'name'=>'Delete User',
            'slug'=>'user.delete',
            'description'=>'User can delete user'
        ]);
        $permission_all[] = $permission->id; 

        // $permission = Permission::create([
        //     'name'=>'Create User',
        //     'slug'=>'user.create',
        //     'description'=>'User can create user'
        // ]);
        // $permission_all[] = $permission->id; 

        // $roladmin->permissions()->sync($permission_all);
    }
}
