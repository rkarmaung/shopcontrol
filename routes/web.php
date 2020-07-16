<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/profile', 'ProfilesController@index')->name('profile');
Route::get('/profile/edit/', 'ProfilesController@edit');
Route::patch('/profile/patch/', 'ProfilesController@update');

Route::post('/post', 'PostsController@store');
Route::get('/post/create', 'PostsController@create');
Route::get('/post/edit/{post}', 'PostsController@edit');
Route::patch('/post/edit/{post}', 'PostsController@update');
Route::patch('/post/edit/{post}', 'PostsController@update');
Route::get('/post/delete/{post}', 'PostsController@delete');

Route::get('/shop/{shopName}', ['as' => 'shops.gallery', 'uses' => 'GalleryController@show']);
