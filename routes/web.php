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

// Adminログイン処理
Route::namespace('Admin\Auth')->prefix('admin')->group(function() {
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
});

/**
 * Adminユーザー
 */
Route::middleware('auth:admin')->namespace('Admin')->prefix('admin')->group(function() {
    Route::get('home', 'HomeController@index')->name('admin.home.index');
    // 記事投稿画面
    Route::get('posts/create', 'PostController@create')->name('admin.post.create');
    // 記事登録処理
    Route::post('posts/store', 'PostController@store')->name('admin.post.store');
    // 各記事編集画面
    Route::get('posts/edit/{id}', 'PostController@edit')->name('admin.post.edit');
    // 記事編集処理
    Route::post('posts/update', 'PostController@update')->name('admin.post.update');
    // 記事削除処理
    Route::post('posts/delete/{id}', 'PostController@delete')->name('admin.post.delete');
    // ログアウト処理
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
});

/**
 * 管理者以上で操作
 */
Route::group(['middleware' => ['auth', 'can:admin']], function () {

    Route::namespace('User\Auth')->prefix('user')->group(function() {
        //ユーザー登録
        Route::get('register', 'RegisterController@showRegistrationForm')->name('user.register');
        Route::post('register', 'RegisterController@register');
    });
    
});

/**
 * 未ログイン各記事画面
 */
Route::get('posts/{id}', 'PostsController@show')->name('show');