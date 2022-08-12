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


Route::get('/','HomeController@Index')->name('homepage');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/docs', 'HomeController@docs')->name('docs.index');
// создание документа.
Route::get('/new/{id?}','HomeController@new')->name('docs.new');
Route::post('/new/{id}', 'HomeController@convertDoc')->name('docs.print');;
Route::post('/daveDoc', 'HomeController@saveDoc')->name('docs.save');;

Route::get('/edit/{id?}','HomeController@edit');
Route::post('/edit/{id}', 'HomeController@edit');
