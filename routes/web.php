<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DocumentsController;

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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/docs', 'DocumentsController@index')->name('docs.index');
Route::get('/open/{id}','DocumentsController@create')->name('docs.create');
Route::post('/open/{id}', 'DocumentsController@open')->name('docs.open');;
Route::post('/save', 'DocumentsController@save')->name('docs.save')
    ->middleware(['auth']);

Route::get('/edit/{id?}','HomeController@edit');
Route::post('/edit/{id}', 'HomeController@edit');

Auth::routes();
