<?php
use Illuminate\Database\Seeder;
use App\Models\Permissions\Permission;
class PostSeeder extends Seeder
{
    public function run()
    {
        $permission = Permission::create([
            'name'=>'Index Post',
            'slug'=>'post.index',
            'description'=>'post can list post'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Show Post',
            'slug'=>'post.show',
            'description'=>'post can show post'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Edit Post',
            'slug'=>'post.edit',
            'description'=>'post can edit post'
        ]);
        $permission_all[] = $permission->id; 
                
        $permission = Permission::create([
            'name'=>'Show Own Post',
            'slug'=>'postown.show',
            'description'=>'post can show own post'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Edit Own Post',
            'slug'=>'postown.edit',
            'description'=>'post can edit own post'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Delete Post',
            'slug'=>'post.delete',
            'description'=>'post can delete post'
        ]);
        $permission_all[] = $permission->id; 
    }
}