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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', "LibraryController@index")->name('homepage');

Route::get('search', "LibraryController@search");

Route::get('book/{id}', "LibraryController@book");

Auth::routes();

Route::get('/logout/{backUrl}', function ($backUrl){
    Auth::logout();
//    if (!isset($backUrl)) return redirect('/');
//    var_dump($backUrl);
    if (Route::has(urldecode($backUrl)))
        return redirect(urldecode($backUrl));
    else
        return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');
