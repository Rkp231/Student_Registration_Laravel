<?php

use Illuminate\Support\Facades\Route;

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
    return view('stud_regist.login');
});

Route::get('/first/{id}', function ($id) {
   // return ($id);
	return view('first',["id"=>$id]);
});

Route::get('cntrlr/{id}','Users@test1');
Route::view('first','welcome');


//Route::view('/form','student_form');
//Route::get('register','register@index',);

Route::post('validate',['uses'=>'register@store','as'=>'validate']);
Route::get('showall',['uses'=>'register@show','as' =>'showall']);
Route::get('register',['uses'=>'register@index','as' =>'register']);
Route::get('edit/{id}',['uses'=>'register@edit','as' =>'edit']);
Route::post('update/{id}',['uses'=>'register@update','as' =>'update']);
Route::get('delete/{id}',['uses'=>'register@destroy','as' =>'delete']);
Route::post('generate',['uses'=>'register@otp_send','as' =>'generate']);
Route::post('lvalidate/{id}',['uses'=>'register@otp_valid','as' =>'lvalidate']);
Route::post('out',['uses'=>'register@log_out','as' =>'out']);
//Route::get('showdata', function()
//return view('showdata');
//});