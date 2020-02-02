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

//Route::get('user/{name}','UserController@show');
// Route::get('/',function(){
// 	//return view('users',['name'=>'Cheche']);
// 	return view('users')->with('name','Pech');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Route::get('/users', 'UserController@index');
Route::resource('users', 'UserController')->middleware('auth');
//Route::resource('note', 'NoteController');

Route::get('note/all','NoteController@all');
Route::get('note/favorite','NoteController@favorite');
Route::get('note/archived','NoteController@archived');
