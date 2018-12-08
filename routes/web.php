<?php

//Main Pages
Route::get('/', 'PageController@home');


//Registration nad Login routes
Auth::routes();


//Subscription routes
Route::get('/subscriptions', 'SubscriptionController@index');
Route::get('/subscriptions/{id}', 'SubscriptionController@show');
Route::post('/subscriptions/{id}', 'OrderController@store');


//Account routes
Route::get('/account', 'AccountController@show');
Route::patch('/account', 'AccountController@update');


//Lesson routes
Route::get('/lessons', 'LessonController@index');
Route::get('/lessons/{lesson}', 'LessonController@show');
Route::patch('/lessons/{lesson}', 'LessonController@update');


//Evaluation routes
Route::get('/evaluations/{evaluation}', 'EvaluationController@show');
Route::post('/evaluations', 'EvaluationController@store');