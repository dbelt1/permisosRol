<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Models\Permissions\Role;
use App\Models\Permissions\Permission;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/role', 'RoleController');
Route::resource('/user', 'UserController');
Route::resource('/post', 'PostController');
Route::resource('/place','PlaceController');
Route::resource('/category','CategoryController');
Route::resource('/timeline','TimelineController');
Route::resource('/comment','COmmentController');
//rutas de usuarios
Route::get('/publicaciones','UserRegisteredController@listPost')->name('userRegistered.index');
Route::post('/crear-comentario','UserRegisteredController@createComment')->name('userRegistered.comment');



Route::get('/test', function () {
    $users = User::find(2);
    // return $users->roles;
    //  return $users->havePermission('rol.index');
    //  Gate::authorize('haveaccess','rol.index');
    //  return $users;  
   
});


