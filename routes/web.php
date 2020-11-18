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

// Userログイン処理
Route::namespace('User\Auth')->prefix('user')->group(function() {
    Route::get('login', 'LoginController@showLoginForm')->name('user.login');
    Route::post('login', 'LoginController@login');
});

/**
 * 一般ユーザー
 */
Route::middleware('auth:user')->namespace('User')->prefix('user')->group(function() {
    Route::get('home', 'HomeController@index')->name('user.home.index');
    // 記事投稿画面
    Route::get('posts/create', 'PostController@create')->name('user.post.create');
    // 記事登録処理
    Route::post('posts/store', 'PostController@store')->name('user.post.store');
    // 各記事編集画面
    Route::get('posts/edit/{id}', 'PostController@edit')->name('user.post.edit');
    // 記事編集処理
    Route::post('posts/update', 'PostController@update')->name('user.post.update');
    // 記事削除処理
    Route::post('posts/delete/{id}', 'PostController@delete')->name('user.post.delete');
    // ログアウト処理
    Route::post('logout', 'Auth\LoginController@logout')->name('user.logout');
});

/**
 * 未ログイン各記事画面
 */
Route::get('posts/{id}', 'PostsController@show')->name('show');