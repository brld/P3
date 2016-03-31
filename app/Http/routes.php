<?php

Route::group(['middleware' => ['web']], function () {

  Route::get('/', function () {
    return view('index');
  });

  /* Page to take user input for lorem ipsum */
  Route::get('/lorem-ipsum', 'LoremController@getLorem');

  /* Page to take information from "get
  lorem-ipsum" and generate text from it */
  Route::post('/lorem-ipsum', 'LoremController@postLorem');

  /* Page to take user input for random users */
  Route::get('/user-generator', 'UserController@getUser');

  /* Page to take information from "get
  user-generator" and generate users from it */
  Route::post('/user-generator', 'UserController@postUser');

  /* Page to take user input for xkcd passwords */
  Route::get('/xkcd', 'XkcdController@getPassword');

  /* Page to take information from "get
  xkcd" and generate xkcd passwords from it */
  Route::post('/xkcd', 'XkcdController@postPassword');

});
