<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->action('PermissionsController@user');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function(){
        $users = User::all();
        return view('dashboard', [
            'users' => $users
        ]);
    })->middleware('role:admin');
    
    Route::get('users/all', 'PermissionsController@user')->middleware('role:a custom user,author,admin');
    Route::get('author/all', 'PermissionsController@author')->middleware('role:author,admin');
    Route::get('admin/all', 'PermissionsController@admin')->middleware('role:admin');
    
    Route::post('roles/assign', 'RoleAssignsController@RoleAssign')->middleware('role:admin');
});
