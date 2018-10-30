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
    return view('index');
});

/*客户列表*/
Route::get('client_list',function(){
    return view('client.index');
});
/*新增客户*/
Route::any('client_add','ClientController@client_add');
/*新增客户操作*/
Route::any('client_add_db','ClientController@client_add_db');