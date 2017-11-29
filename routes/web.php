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
    return redirect('/welcome');
});
Route::get('/welcome', function(){
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('category/{category}', 'HomeController@showClientByCategory')->name('show_clients_by_category');
    Route::resource('client', 'ClientController', ['only' =>['show']]);
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'UserController@show')->name('user.show');
    Route::post('/profile', 'UserController@update')->name('user.update');
    Route::post('/profile/password', 'UserController@updatePassword')->name('password.update');
    Route::post('/client/{client}/action', 'ClientController@actionClient')->name('action.client');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');

    Route::middleware('auth:admin')->group(function (){
        Route::get('/dashboard', 'Admincontroller@index')->name('admin.dashboard');
        Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');
        Route::resource('category', 'CategoryController',['except' => ['show']]);
        Route::resource('client', 'ClientController',['except' => ['show']]);
        Route::get('user', 'UserController@index')->name('admin.show.list.user');
        Route::put('user/{user}/toggle_active_status', 'UserController@toggle_active_status')->name('admin.edit.user');
    });

});