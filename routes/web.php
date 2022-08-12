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

Route::middleware(['auth'])->group(function () {
    Route::post('/save', 'DocumentsController@save')->name('docs.save');

    Route::get('/my-documents', 'MyDocumentsController@index')->name('my-docs.index');
    Route::get('/my-documents/print/{document}', 'MyDocumentsController@print')
        ->name('my-docs.print');
    Route::get('/my-documents/download/{document}', 'MyDocumentsController@download')
        ->name('my-docs.download');
});

Route::get('/edit/{id?}','HomeController@edit');
Route::post('/edit/{id}', 'HomeController@edit');

Auth::routes();
