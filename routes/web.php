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

Route::get('/', 'PagesController@root')->name('root');
// laravel 用户认证路由
Auth::routes(); 

Route::group(['middleware' => 'auth'], function() {
    // 只有已经登录的用户才能看到这个提示界面
    Route::get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');
    Route::group(['middleware' => 'email_verified'], function(){
        Route::get('/test', function(){
            return 'your email is verified';
        });
    });
});