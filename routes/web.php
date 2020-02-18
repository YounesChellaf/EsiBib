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
    return view('home');
});
Route::resource('domaines','DomaineController');
Route::resource('types','TypeController');
Route::resource('emplacements','EmplacementController');
Route::resource('books','BookController');
Route::get('/admin', function () {
    return view('admin.layouts.landing');
});

Route::get('/admin/table', function () {
    return view('admin.layouts.domaine');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
