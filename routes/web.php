<?php

use Illuminate\Http\Request;

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

Route::view('/profile', 'user.user-profile')->name('my-profile');

Route::group(['middleware' => 'auth', 'prefix' => 'user', 'namespace' => 'User'], function () {
});

Route::post('files/upload', function (Request $request) {
    return response(['message'=>'ok'], 200);
});

Route::get('/home', function () {
    return redirect('/');
})->name('home');
