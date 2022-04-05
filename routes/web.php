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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');
Route::post('/tweet', 'PostsController@tweet');
Route::post('/uptweet', 'PostsController@uptweet');

//プロフィール編集
Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@profile');
Route::post('/upprofile','UsersController@upprofile');
Route::get('/index','UsersController@index');

// フォローリスト
Route::get('/followList','FollowsController@followList');


// フォロワーリスト
Route::get('/followerList','FollowsController@followerList');


Route::get('/logout','Auth\LoginController@logout');

Route::get('/posts/{id}/delete','PostsController@trash');

// ユーザー検索
Route::get('/usersearch','UsersController@usersearch');
Route::post('/usersearch','UsersController@usersearch');

// フォロー機能
Route::get('/follow/{follow}','FollowsController@follow');
Route::get('/unfollow/{unfollow}','FollowsController@unfollow');
