<?php

Route::group(['middleware' => ['web']], function () {

  Route::get('/', function () {
    return view('index');
  });

  Route::get('/lorem-ipsum', 'LoremController@getLorem');

  Route::post('/lorem-ipsum', 'LoremController@postLorem');

  Route::get('/user-generator', 'LoremController@getUser');

  Route::post('/user-generator', 'LoremController@postUser');

  Route::get('/practice', function () {

  });

});
