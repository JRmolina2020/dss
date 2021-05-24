<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('home');
});

Route::get('register', function () {
    return view('topics');
});

Route::get('words', function () {
    return view('words');
});

 Route::post('topics', 'TopicController@store');
  Route::post('words', 'WordsController@store');
  Route::post('cities', 'CityController@store');
 Route::get('topics', 'TopicController@index');
  Route::get('topics/{id}', 'TopicController@indexTwo');
    Route::get('words/{id}', 'WordsController@indexTwo');
      Route::get('cities/{id}', 'CityController@indexTwo');
 Route::delete('topics/{id}', 'TopicController@destroy');
 Route::put('topics/{id}', 'TopicController@update');
  
   