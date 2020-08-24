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

Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localizationRedirect' ]
], function() {

	Route::get('/', 'PageController@index')->name('homepage');

	Route::get('/contact', 'ContactController@index')->name('contact.index');
	Route::post('/contact', 'ContactController@store')->name('contact.store');

	// TODO: book, feedback and terms

});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
