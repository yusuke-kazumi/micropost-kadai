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

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::group(['middleware' => ['auth']], function () {
Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});

Route::get('/', 'MicropostsController@index');

// omit


Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
// Route add Twitter clone task-2        
        Route::get('favouriting', 'UsersController@favouriting')->name('users.favouriting');
        Route::post('favourite', 'FavouriteController@store')->name('favourite.favourite');
        Route::delete('unfavourite', 'FavouriteController@destroy')->name('favourite.unfavourite');
    });

Route::resource('microposts', 'MicropostsController', ['only' => ['store','destroy']]);


});