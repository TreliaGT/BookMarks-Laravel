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

Route::get('/', 'HomeController@Welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware(['auth', 'role:Admin|User|UserAdmin|Ban'])->name('home');
Route::get('/Bookmarks/AdminView', 'AdminUserController@AdminViewBookmarks')->middleware(['auth', 'role:Admin' ]);
Route::get('/users/{id}' , 'AdminUserController@show')->middleware(['auth', 'role:Admin|User|UserAdmin']);

Route::resource('/users', 'AdminUserController')->middleware(['auth', 'role:Admin|UserAdmin']);
Route::resource('profile/social', 'socialMediaController')->middleware(['auth', 'role:Admin|User']);
Route::resource('profile', 'ProfileController')->middleware(['auth', 'role:Admin|User|UserAdmin']);
Route::resource('/Bookmarks', 'BookmarksController')->middleware(['auth', 'role:Admin|User']);
Route::resource('/tags', 'AdminTagsController')->middleware(['auth', 'role:Admin']);

Route::post('/tags/deleteAll', 'AdminTagsController@DeleteAll')->middleware(['auth', 'role:Admin']);
Route::post('Bookmarks/search', 'BookmarksController@search')->middleware(['auth', 'role:Admin|User']);
Route::post('/users/search', 'AdminUserController@search')->middleware(['auth', 'role:Admin|UserAdmin']);