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

Route::group(['middleware' => 'auth', 'prefix' => 'events'], function () {
    Route::get('/', 'Event\EventController@index')->middleware('auth')->name('events');
    Route::get('/view/{event}', 'Event\EventController@show')->name('event-view');
});



Auth::routes();

Route::get('/home', function () {
    return redirect('/');
})->name('home');
