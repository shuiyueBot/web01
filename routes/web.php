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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('vm')->group(function(){
    Route::get("login","Login\LoginController@login");//登陆表单
    Route::post("loginDo","Login\LoginController@loginDo");//登陆的逻辑方法
    Route::get("reg","Login\LoginController@reg");//注册表单
    Route::post("regDo","Login\LoginController@regDo");//注册的逻辑方法
    Route::get("test","Login\LoginController@test");//测试方法
    Route::get("center","Login\LoginController@center")->middleware("checklogin");//用户中心
});