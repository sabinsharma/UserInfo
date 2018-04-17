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


/*Route::get('/create', function () {
	return view('clientinfo.create');
});*/

/*Route::get('/show',function (){
return view('clientinfo.show');
});*/


/*Route::get('/','ClientsController@create');

Route::post('userinfo/submit','ClientInfoController@submit');

Route::get('/show','ClientInfoController@show');

Route::get('/listing','ClientInfoController@showAll');


Route::get('/','ClientsController@create');*/


//initially load the main layout page
/*Route::get('/',function (){
	return view('layouts.app');
});*/

Route::get('/',function (){
	return view('layouts.main');
});

//route for ajax call to create view
Route::get('/create','ClientsController@ajaxCreate');

//route for ajax call to index view and pagination
Route::get('/users','ClientsController@ajaxIndex');

//route for ajax call to save data
Route::post('user/save','ClientsController@ajaxStore');

//route for ajax call to display Edit form
Route::get('/editUser','ClientsController@ajaxEdit');

//route for ajax call to update data
Route::post('user/update','ClientsController@ajaxUpdate');

//route for delete
Route::get('user/delete','ClientsController@ajaxDelete');
//Route::resource('users','ClientsController');

//Route::get('/users','ClientsController@index');