<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Models\Permissions\Role;
use App\Models\Permissions\Permission;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/role', 'RoleController')->names('role');
Route::resource('/user', 'UserController');

Route::get('/test', function () {
    $users = User::find(2);
    // return $users->roles;
    //  return $users->havePermission('rol.index');
    //  Gate::authorize('haveaccess','rol.index');
    //  return $users;  
   
});


