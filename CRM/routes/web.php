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
/*首页*/
Route::get('/', function () {
    return view('admin.index');
});
/*客户列表*/
Route::any('client_list','Admin\ClientController@client_list');

/*新增客户*/
Route::any('client_add','Admin\ClientController@client_add');

/*新增客户操作*/
Route::any('client_add_db','Admin\ClientController@client_add_db');