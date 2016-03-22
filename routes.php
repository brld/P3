<?php

Route::get('/', function () {
  #return view('welcome');
  return 'Project 3';
});

Route::get('/lorem', function () {
  return 'Make some lorem ipsum.';
});

Route::group(['middleware' => ['web']], function () {
  //
});
