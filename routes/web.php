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
    return view('welcome');
});


//Route::resource('books', 'BookController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

Route::group(['prefix' => 'books'], function() {
    Route::get('/', 'BookController@index')->name('books.index');
    Route::get('/create', 'BookController@create')->name('books.create');
    Route::post('/create', 'BookController@store')->name('books.store');
    Route::get('/{id}/show', 'BookController@show')->name('books.show');
    Route::get('/{id}/edit', 'BookController@edit')->name('books.edit');
    Route::patch('/{id}/update', 'BookController@update')->name('books.update');
    Route::put('{id}/update', 'BookController@update')->name('books.update');
    Route::delete('/{id}/delete', 'BookController@destroy')->name('books.destroy');
    Route::get('/download/{file}','BookController@download')->name('books.download');
    Route::get('/listissed', 'BookController@listissed')->name('books.listissed');


});

Route::group(['prefix' => 'reviews'], function() {
    Route::get('/{id}/givereview', 'ReviewController@givereview')->name('reviews.givereview');
    Route::post('/create', 'ReviewController@store')->name('reviews.store');

});

Route::group(['prefix' => 'checkout'], function() {
    Route::post('/issuebook', 'CheckoutController@issuebook')->name('checkout.issuebook');
    Route::post('/returnbook', 'CheckoutController@returnbook')->name('checkout.returnbook');

});
});




