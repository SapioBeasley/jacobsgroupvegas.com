<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/agents', [
	'as' => 'agents',
	'uses' => 'PagesController@showAgents'
]);

Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'PagesController@showContact'
]);

Route::get('/properties/{listingId}', [
	'as' => 'properties.show',
	'uses' => 'PagesController@showSingleProperties'
]);

Route::get('/properties', [
	'as' => 'properties',
	'uses' => 'PagesController@showProperties'
]);

Route::get('/buying-services', [
	'as' => 'services.buying',
	'uses' => 'PagesController@showBuyingServices'
]);

Route::get('/listing-services', [
	'as' => 'services.listing',
	'uses' => 'PagesController@showLisingServices'
]);

Route::get('/useful-links', [
	'as' => 'useful.links',
	'uses' => 'PagesController@showUsefulLinks'
]);

Route::get('/shortcodes', function () {
	return view('shortcodes');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/', [
		'as' => 'home',
		'uses' => 'PagesController@showHome'
	]);

	Route::get('/clear-session', 'PagesController@clearSession');
	Route::get('/get-properties', 'PagesController@getProperties');

	Route::post('/post-listing', [
		'as' => 'postListing',
		'uses' => 'PagesController@postListing'
	]);
});
