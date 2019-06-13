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
Route::resource('/users', 'AdminUserController')->middleware(['auth', 'role:Admin']);
Route::get('/Bookmarks/AdminView', 'AdminUserController@AdminViewBookmarks')->middleware(['auth', 'role:Admin']);
Route::resource('profile/social', 'socialMediaController')->middleware('auth');
Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('/Bookmarks', 'BookmarksController')->middleware('auth');