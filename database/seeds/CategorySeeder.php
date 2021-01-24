<?php

use Illuminate\Database\Seeder;
use App\Models\Permissions\Permission;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $permission = Permission::create([
            'name' => 'Index Category',
            'slug' => 'category.index',
            'description' => 'category can list category'
        ]);
        $permission_all[] = $permission->id;
        $permission = Permission::create([
            'name' => 'Show Category',
            'slug' => 'category.show',
            'description' => 'category can show category'
        ]);
        $permission_all[] = $permission->id;
        $permission = Permission::create([
            'name' => 'Edit Category',
            'slug' => 'category.edit',
            'description' => 'category can edit category'
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show Own Category',
            'slug' => 'categoryown.show',
            'description' => 'category can show own category'
        ]);
        $permission_all[] = $permission->id;
        $permission = Permission::create([
            'name' => 'Edit Own Category',
            'slug' => 'categoryown.edit',
            'description' => 'category can edit own category'
        ]);
        $permission_all[] = $permission->id;
        $permission = Permission::create([
            'name' => 'Delete category',
            'slug' => 'category.delete',
            'description' => 'category can delete category'
        ]);
        $permission_all[] = $permission->id;
    }
}
