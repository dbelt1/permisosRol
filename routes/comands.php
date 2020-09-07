Route::get('/test',function(){
    // return Role::create([
    //     'name'=>'Admin',
    //     'slug'=>'admin',
    //     'description'=>'administrator',
    //     'full-access'=>'yes'
    // ]);
    // return Role::create([
    //     'name'=>'Guest',
    //     'slug'=>'guest',
    //     'description'=>'guest',
    //     'full-access'=>'no'
    // ]);
    // return Permission::create([
    //     'name'=>'Create Product',
    //     'slug'=>'product.created',
    //     'description'=>'User can create permission',
    // ]);
    // return Permission::create([
    //     'name'=>'List Product',
    //     'slug'=>'product.Index',
    //     'description'=>'User can list a permission',
    // ]);
    $role = Role::find(2);
    // $users->roles()->attach([1,3]);
     $role->permissions()->sync([1,2]);
    return $role->permissions;


});