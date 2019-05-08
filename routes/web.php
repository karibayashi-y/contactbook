<?php

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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function(){
//home
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
//login logout
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
//register
    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');
//usercreate
    Route::get('usercreate','Admin\UserCreateController@index')->name('admin.usercreateform');
    Route::post('usercreate','Admin\UserCreateController@usercreate')->name('admin.usercreateform');


//contentcreate
    Route::get('forms/create', 'Admin\CreateController@showCreateForm')->name('index.createform');
    Route::post('forms/create', 'Admin\CreateController@create');

//userform
    Route::get('forms/{id}', 'Admin\UserFormController@showUserForm')->name('index.userform');
    Route::post('forms/{id}', 'Admin\UserFormController@delete');
    Route::get('forms/{form_id}/edit', 'Admin\UserFormController@editForm')->name('edit.userform');
    Route::put('forms/{form_id}/edit', 'Admin\UserFormController@update');

    




//userhome:admin
    

});

Route::get('/home', 'HomeController@index')->name('home');
