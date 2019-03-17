<?php

//Static Pages
Route::get('/', 'PageController@home');
Route::get('/help', 'PageController@help');
Route::post('/help', 'PageController@store');

//Registration nad Login routes
Auth::routes();


//Subscription routes
Route::get('/subscriptions', 'SubscriptionController@index');
Route::get('/subscriptions/{id}', 'SubscriptionController@create');
Route::post('/subscriptions', 'SubscriptionController@store');

//Account routes
Route::get('/account', 'AccountController@show');
Route::patch('/account', 'AccountController@update');


//Lesson routes
Route::get('/lessons', 'LessonController@index');
Route::get('/lessons/{lesson}', 'LessonController@show');
Route::patch('/lessons/{lesson}', 'LessonController@update');


//Records routes
Route::post('/records/{id}', 'RecordController@store');


//Evaluation routes
Route::get('/evaluations/{id}', 'EvaluationController@show');
Route::get('/evaluate/{id}', 'EvaluationController@create');
Route::post('/evaluate', 'EvaluationController@store');


//Processing PayPal payment
Route::post('/paypal', 'PaypalController@pay');
Route::get('/status/{type}/{id}', 'PaypalController@status');