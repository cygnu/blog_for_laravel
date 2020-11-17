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

/**
 * 未ログイントップページ
 */
Route::get('/', 'PostsController@index')->name('posts');

// 記事投稿画面
Route::get('/posts/create', 'PostsController@create')->name('create');
// 記事登録処理
Route::post('/posts/store', 'PostsController@store')->name('store');
// 各記事編集画面
Route::get('/posts/edit/{id}', 'PostsController@edit')->name('edit');
// 記事編集処理
Route::post('/posts/update', 'PostsController@update')->name('update');
// 記事削除処理
Route::post('/posts/delete/{id}', 'PostsController@delete')->name('delete');

Auth::routes();

// Route::get('/home', 'PostsController@postsHome')->name('posts.home');
Route::get('/home', 'HomeController@index')->name('home');

/**
 * 未ログイン各記事画面
 */
Route::get('/posts/{id}', 'PostsController@show')->name('show');