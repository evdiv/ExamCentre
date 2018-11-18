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
Route::get('/account', 'AccountController@index');
Route::get('/lessons', 'LessonController@index');
Route::get('/lesson/{lesson}', 'LessonController@show');


//Subscription routes
Route::get('/subscriptions/{subscription}', 'SubscriptionController@show');
