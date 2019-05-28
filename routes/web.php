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
    return view('auth.login');
});

Route::get('/dashboard', 'DashboardController@show')->name('dashboard');
Route::get('/users', 'DashboardController@show')->name('users');
Route::get('/audit-trail', 'DashboardController@show')->name('audit-trail');
Route::get('/settings', 'DashboardController@show')->name('settings');

// /routes
Route::get('/routes', 'RouteController@index')->name('routes');
Route::get('/routes/new/', 'RouteController@create')->name('route_new');
Route::get('/routes/{name}', 'RouteController@show')->name('route');
Route::post('/routes/new/submit', 'RouteController@store')->name('routes_new_submit');
Route::patch('/routes/update/{id}', 'RouteController@update')->name('routes_update_submit');
