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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','HomeController@Index');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/docs', 'HomeController@docs');
// создание документа. 
Route::get('/new/{id?}','HomeController@new');
Route::post('/new/{id}', 'HomeController@convertDoc');
Route::post('/daveDoc', 'HomeController@saveDoc');

Route::get('/edit/{id?}','HomeController@edit');
Route::post('/edit/{id}', 'HomeController@edit');
