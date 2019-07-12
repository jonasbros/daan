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
Auth::routes();

Route::get('/', function () {
    if( !Auth::user() ) {
        return view('auth.login');
    }else {
        return redirect('/dashboard');
    }
    
});

Route::get('/dashboard', 'DashboardController@show')->name('dashboard');
Route::get('/audit-trail', 'DashboardController@show')->name('audit-trail');
Route::get('/settings', 'DashboardController@show')->name('settings');

// /routes
Route::get('/routes', 'RouteController@index')->name('routes');
Route::get('/routes/archive', 'RouteController@archive')->name('route_archive');
Route::get('/routes/archive/restore/{id}', 'RouteController@restore')->name('route_archive_restore');
Route::get('/routes/new/', 'RouteController@create')->name('route_new');
Route::get('/routes/{name}', 'RouteController@show')->name('route');
Route::post('/routes/new/submit', 'RouteController@store')->name('routes_new_submit');
Route::post('/routes/update/{id}', 'RouteController@update')->name('routes_update_submit');
Route::post('/routes/delete/{id}', 'RouteController@destroy')->name('routes_delete_submit')->middleware('admin-role');

//users
Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/{id}', 'UserController@show')->name('user');