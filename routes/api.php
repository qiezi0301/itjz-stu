<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/deploy','DeploymentController@deploy');

Route::get('email/verify/{token}', 'EmailController@verify')->name('email.verify');

Route::get('/series', 'SerieController@index');
Route::get('/series/{serie}', 'SerieController@show');

Route::get('/lessons/{lesson}', 'LessonController@show');
Route::get('/lessonsBySerie/{lesson}', 'LessonController@lessonsBySerie');

Route::post('/register','Auth\RegisterController@register');
Route::post('/login','Auth\LoginController@login');
Route::post('/logout','Auth\LoginController@logout');
Route::post('/token/refresh','Auth\LoginController@refresh');
Route::post('/user/profile/update','ProfileController@update')->middleware('auth:api');
Route::post('/user/password/update','PasswordController@update')->middleware('auth:api');

//评论的路由
Route::get('lesson/{id}/comments', 'CommentController@lesson');

Route::post('comment', 'CommentController@store');