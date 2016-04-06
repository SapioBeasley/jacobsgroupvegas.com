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

Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'PagesController@showContact'
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

Route::get('/get-properties', [
	'as' => 'getProperties',
	'uses' => 'PagesController@getProperties'
]);

Route::get('/communities', [
	'as' => 'communities',
	'uses' => 'PagesController@showCommunities'
]);

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

	Route::get('/buying-services', [
		'as' => 'services.buying',
		'uses' => 'PagesController@showBuyingServices'
	]);

	Route::get('/search', [
		'as' => 'search',
		'uses' => 'SearchesController@search'
	]);

	Route::get('/properties', [
		'as' => 'properties',
		'uses' => 'PagesController@showProperties'
	]);

	Route::post('/post-listing', [
		'as' => 'postListing',
		'uses' => 'PagesController@postListing'
	]);

	Route::get('/community/{community}', [
		'as' => 'communities.show',
		'uses' => 'PagesController@getCommunity'
	]);

	Route::get('/clear-session', [
		'as' => 'clearSession',
		'uses' => 'PagesController@clearSession'
	]);

	Route::get('/properties/{listingId}', [
		'as' => 'properties.show',
		'uses' => 'PagesController@showSingleProperties'
	]);

	Route::post('/property-inquire', [
		'as' => 'properties.inquire',
		'uses' => 'ContactsController@propertyInquire'
	]);

	Route::get('/agents/{agent}', [
		'as' => 'agents.show',
		'uses' => 'PagesController@showSingleAgents'
	]);

	Route::get('/agents', [
		'as' => 'agents',
		'uses' => 'PagesController@showAgents'
	]);
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::post('/ajax-auth', [
		'as' => 'ajax.auth',
		'uses' => '\App\Http\Controllers\Auth\AuthController@ajaxAuth'
	]);

    // Route::get('/home', 'HomeController@index');
});
