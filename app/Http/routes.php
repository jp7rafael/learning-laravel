<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['as' => 'welcome.index', 'uses' => 'WelcomeController@index']);

Route::resource('articles', 'ArticlesController');
Route::resource('authors', 'AuthorsController');

Route::get('/articles/{articles}/recommend', ['as' => 'articles.recommend.create', 'uses' => 'ArticlesEmailController@create']);
Route::post('/articles/{articles}/recommend', ['as' => 'articles.recommend.send', 'uses' => 'ArticlesEmailController@send']);
