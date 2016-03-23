<?php

Route::get('/', function () {
  #return view('welcome');
  return 'Project 3';
});

Route::get('/lorem-ipsum', function () {
  return 'Make some lorem ipsum.';
});

Route::get('/user-generator', function () {
  return 'Generate a random user.';
});

Route::group(['middleware' => ['web']], function () {
  //
});
