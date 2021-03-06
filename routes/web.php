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
Route::get('posts/welcome',function(){
    return view('welcome');
});

Route::get('/','PostsController@index');

Route::get('posts/add','PostsController@add')->middleware('auth');
Route::post('posts/add','PostsController@create');

Route::get('posts/edit','PostsController@edit');
Route::post('posts/edit','PostsController@update');

Route::get('posts/show','PostsController@show');

Route::get('posts/del','PostsController@delete');
Route::post('posts/del','PostsController@remove');

Route::get('posts/find','PostsController@find');
Route::post('posts/find','PostsController@search');

Route::get('posts/mypage','PostsController@mypage');

Route::get('posts/userpage','PostsController@userpage');

Route::post('/posts/{post}/likes', 'LikesController@store');
Route::post('/posts/{post}/likes/{like}', 'LikesController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('comments','CommentsController',['only' => ['store']]);

Route::get('result/ajax','CommentsController@getData');