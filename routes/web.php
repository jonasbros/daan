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
Route::get('/routes', 'RouteController@index')->name('routes');
Route::get('/users', 'DashboardController@show')->name('users');
Route::get('/audit-trail', 'DashboardController@show')->name('audit-trail');
Route::get('/settings', 'DashboardController@show')->name('settings');

Route::get('/routes/{name}', 'RouteController@show')->name('route');