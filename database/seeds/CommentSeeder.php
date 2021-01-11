<?php
use Illuminate\Database\Seeder;
use App\Models\Permissions\Permission;
class CommentSeeder extends Seeder
{
    public function run()
    {
        $permission = Permission::create([
            'name'=>'Index Comment',
            'slug'=>'comment.index',
            'description'=>'comment can list comment'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Show Comment',
            'slug'=>'comment.show',
            'description'=>'comment can show comment'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Edit Comment',
            'slug'=>'comment.edit',
            'description'=>'comment can edit comment'
        ]);
        $permission_all[] = $permission->id; 
                
        $permission = Permission::create([
            'name'=>'Show Own Comment',
            'slug'=>'commentown.show',
            'description'=>'comment can show own comment'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Edit Own Comment',
            'slug'=>'commentown.edit',
            'description'=>'comment can edit own comment'
        ]);
        $permission_all[] = $permission->id; 
        $permission = Permission::create([
            'name'=>'Delete Comment',
            'slug'=>'comment.delete',
            'description'=>'comment can delete comment'
        ]);
        $permission_all[] = $permission->id; 
    }
}