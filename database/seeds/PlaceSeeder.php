<?php
use Illuminate\Database\Seeder;
use App\Models\Permissions\Permission;
class PlaceSeeder extends Seeder
{
    public function run()
    {
        $permission = Permission::create([
            'name'=>'Index Place',
            'slug'=>'place.index',
            'description'=>'place can list place'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Show Place',
            'slug'=>'place.show',
            'description'=>'place can show place'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Edit Place',
            'slug'=>'place.edit',
            'description'=>'place can edit place'
        ]);
        $permission_all[] = $permission->id; 
                
        $permission = Permission::create([
            'name'=>'Show Own Place',
            'slug'=>'placeown.show',
            'description'=>'place can show own place'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Edit Own Place',
            'slug'=>'placeown.edit',
            'description'=>'place can edit own place'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Delete Place',
            'slug'=>'place.delete',
            'description'=>'place can delete place'
        ]);
        $permission_all[] = $permission->id; 
    }
}