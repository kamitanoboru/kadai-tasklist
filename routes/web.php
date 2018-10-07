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


//トップページ表示　リスト表示
Route::get('/', 'TasksController@index');


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');

//ログアウト
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');



//　ログイン認証付きのルーティング
Route::group(['middleware' => ['auth']], function () {

    //タスクの登録、変更、削除など
    Route::resource('tasks', 'TasksController', ['only' => ['index','show', 'create', 'store' ,'update','edit','destroy']]);


});
