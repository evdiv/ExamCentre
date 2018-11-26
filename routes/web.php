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

//Static Pages
Route::get('/', 'PageController@home');


//Registration nad Login routes
Auth::routes();


//Account routes
Route::get('/account', 'AccountController@show');
Route::patch('/account', 'AccountController@update');


//Lesson routes
Route::get('/lessons', 'LessonController@index');
Route::get('/lessons/{lesson}', 'LessonController@show');
Route::patch('/lessons/{lesson}', 'LessonController@update');


//Subscription routes
Route::get('/subscriptions', 'SubscriptionController@index');
Route::get('/subscriptions/{subscription}', 'SubscriptionController@show');
Route::post('/subscriptions/{subscription}', 'OrderController@store');


//Evaluation routes
Route::get('/evaluations/{evaluation}', 'EvaluationController@show');
Route::post('/evaluations', 'EvaluationController@store');