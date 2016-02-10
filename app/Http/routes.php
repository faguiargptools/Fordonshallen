<?php

Route::group(['middleware' => 'web'], function () {

	Route::get('/', function () {
		return view('index');
	});

	Route::get('/nyheter', 'NewsController@index');

	Route::get('/nyheter/{id}', 'NewsController@read');

	Route::get('/getBrand/{type}', 'MotorController@getBrand');

	Route::get('/getModell/{brand}', 'MotorController@getModell');

	Route::get('/getEngine/{type}/{brand}/{model}', 'MotorController@getEngine');

	Route::get('/getOptimization/{type}/{brand}/{model}', 'MotorController@getOptimization');

	Route::get('/getOptimization2/{type}/{brand}/{model}/{engine}', 'MotorController@getOptimization2');

	Route::get('/adblue-inaktivering', function () {

		$text = \App\AdblueText::first();
		$text = str_replace('<pre>', '', $text->text);
		$text = str_replace('</pre>', '', $text);

		return view('adblue-inaktivering', ['text' => $text]);
	});

	Route::get('/vad-ar-adblue', function () {
		return view('vad-ar-adblue');
	});

	Route::get('/egr-system-inaktivering', function () {
		return view('egr-system-inaktivering');
	});

	Route::get('/motoroptimering', function () {
		return view('motoroptimering');
	});

	Route::get('/villkor-garanti', function () {
		return view('villkor-garanti');
	});

	Route::get('/faq', function () {
		return view('faq');
	});

	Route::get('/om-oss', function () {
		return view('om-oss');
	});

	Route::get('/forsaljningsvillkor', function () {
		return view('forsaljningsvillkor');
	});

	Route::get('/kontaktinformation', function () {
		return view('kontaktinformation');
	});

    Route::get('/butik', 'ShopController@index');

	Route::get('/butik/{produkt}', 'ShopController@product');

	Route::get('/checkout', 'ShopController@checkout');

	Route::get('/emptyCart', function(){
		LaraCart::destroyCart();
		return \Illuminate\Support\Facades\Redirect::back();
	});

	Route::get('/ShopRemoveItem', 'ShopController@removeItem');

	Route::post('/butik/addToCart', 'ShopController@addToCart');

	Route::get('/contactmail', function(){
		echo "Hello!";
	});

});
