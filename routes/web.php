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
    return view('home')->withBooks(\App\Book::all());
})->name('landing');
Route::group(['middleware' => 'auth'],function (){
    Route::get('/admin', function () {
        return view('admin.layouts.landing');
    })->name('admin');
    Route::resource('domaines','DomaineController');
    Route::resource('types','TypeController');
    Route::resource('emplacements','EmplacementController');
    Route::resource('books','BookController');
    Route::resource('users','StudentController');
});

Route::resource('prises','PriseController');
Route::post('/prises/confirm/{id}','PriseController@confirm')->name('prise.confirm');
Route::post('/prises/rendu/{id}','PriseController@rendu')->name('prise.rendu');
Route::post('/reserves/confirm/{id}','ReservationController@confirm')->name('reserves.confirm');
Route::post('/prises/reject/{id}','PriseController@reject')->name('prise.reject');
Route::post('/reserves/reject/{id}','ReservationController@reject')->name('reserves.reject');
Route::post('/reserves/allouer/{id}','ReservationController@allouer')->name('reserves.allouer');
Route::resource('reserves','ReservationController');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
