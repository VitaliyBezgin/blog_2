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





Route::get('article/{slug}', 'BlogController@getSingle')->name('single');
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('read', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

Route::resource('posts', 'PostsCRUD\PostsController');

Route::resource('category', 'Categories\CategoryController', ['except' => ['create']]);
Route::get('categories/{category_name}', 'Categories\CategoryController@show')->name('categoryArticles');
Route::resource('tags', 'Tags\TagController', ['except' => ['create']]);

Route::post('comments/{id}', 'Comments\CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit', 'Comments\CommentsController@edit')->name('comments.edit');
Route::put('comments/{id}/edit', 'Comments\CommentsController@update')->name('comments.update');
Route::delete('comments/{id}/edit', 'Comments\CommentsController@destroy')->name('comments.destroy');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
