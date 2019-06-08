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
    return view('Pages.welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile')->middleware('auth');
Route::post('/profile', 'HomeController@update_UserImage')->middleware('auth');
Route::post('/profile/social', 'HomeController@CreateSocial')->middleware('auth');
Route::resource('/users', 'AdminUserController')->middleware(['auth', 'role:Admin']);