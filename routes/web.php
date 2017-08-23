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

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'events', 'namespace' => 'Event'], function () {
    Route::get('/', 'EventController@index')->middleware('auth')->name('events');
    Route::get('/view/{event}', 'EventController@show')->name('event-view');
    Route::get('/add', 'EventController@add')->name('event-add');
    Route::post('/store', 'EventController@store')->name('event-store');
});


Route::get('/home', function () {
    return redirect('/');
})->name('home');
