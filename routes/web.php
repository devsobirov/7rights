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
Route::post('/open/{id}', 'DocumentsController@open')->name('docs.open');

Route::middleware(['auth'])->prefix('my-documents')->group(function () {

    Route::get('/', 'MyDocumentsController@index')->name('my-docs.index');
    Route::get('edit/{document}', 'MyDocumentsController@edit')->name('my-docs.edit');
    Route::get('temporary/{document}', 'MyDocumentsController@temporary')->name('my-docs.temporary');
    Route::get('print/{document}', 'MyDocumentsController@print')->name('my-docs.print');
    Route::get('download/{document}', 'MyDocumentsController@download')->name('my-docs.download');

    Route::post('/save', 'DocumentsController@save')->name('docs.save');
    Route::post('/saveAndOpen/{id?}', 'MyDocumentsController@saveAndOpen')->name('my-docs.save-and-open');
    Route::post('/temporary', 'MyDocumentsController@openTemporary')->name('my-docs.open-temporary');
    Route::post('update', 'MyDocumentsController@update')->name('my-docs.update');
});

Route::get('/edit/{id?}','HomeController@edit');
Route::post('/edit/{id}', 'HomeController@edit');

Auth::routes();
