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

Route::get('/', "HomeController@index")->name('homepage');

Route::get('search', "LibraryController@index");

Route::get('book/{id}', "LibraryController@book");

Route::get('bookshelf', function (){
    $books = new \App\Http\Controllers\Helper\GoogleBooksApi();
    $books->setSearch('walden', 9);
    $books = $books->allBooks();
    return view('bookshelf')->with('books', $books);
});

Auth::routes();

Route::get('/logout/{backUrl}', function ($backUrl){
    Auth::logout();
//    if (!isset($backUrl)) return redirect('/');
//    var_dump($backUrl);
//    if (Route::has(urldecode($backUrl)))
//        return redirect(urldecode($backUrl));
//    else
        return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');
