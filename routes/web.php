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


Auth::routes();

Route::get('/', function() {
	if (Auth::check()) {
		return redirect('/user');
	} else {
		return view('auth.login');
	}
});

Route::group(['prefix' => 'user'], function() {
	Route::group(['middleware' => 'auth'], function() {
		Route::get('/', 'HomeController@index');
		Route::prefix('event')->group(function(){
			Route::get('','EventController@index');
			Route::get('create','EventController@create');
			Route::post('add_new','EventController@store');
			Route::get('edit/{id}','EventController@edit');
			Route::post('update/{id}','EventController@update');
			Route::post('tweet','EventController@tweet');
		});

		Route::prefix('location')->group(function(){
			Route::get('','LocationController@index');
			Route::get('create','LocationController@create');
			Route::post('add_new','LocationController@store');
			Route::get('edit/{id}','LocationController@edit');
			Route::post('update/{id}','LocationController@update');
		});

		Route::prefix('ticket')->group(function(){
			Route::get('','TicketController@index');
			Route::get('create','TicketController@create');
			Route::post('add_new','TicketController@store');
			Route::get('edit/{id}','TicketController@edit');
			Route::post('update/{id}','TicketController@update');
		});
	});
});

Route::get('user/event/detail/{id}','EventController@show');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('user/logout', 'Auth\AuthController@logout');
