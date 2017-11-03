<?php

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin'], function(){

	Route::get('/','AdminController@index');

	Route::resource('pegawai','PegawaiController');

	Route::get('cuti/proses',['as' => 'cuti.proses','uses' => 'CutiController@proses']);

	Route::get('cuti/berjalan',['as' => 'cuti.berjalan','uses' => 'CutiController@berjalan']);

	Route::resource('cuti','CutiController');

	Route::resource('/cuti-type','CutiTypeController');

	Route::get('/cuti/ditolak',['as' => 'cuti.ditolak','uses' => 'CutiController@cutiDitolak']);

	Route::get('/cuti/reject/{id}',['as' => 'cuti.reject','uses' => 'CutiController@cutiReject']);

	Route::get('/cuti/approve/{id}',['as' => 'cuti.approve','uses' => 'CutiController@cutiApproved']);

	Route::get('/cuti/berjalan',['as' => 'cuti.berjalan','uses' => 'CutiController@cutiBerjalan']);

	Route::get('/cuti/showFormUmc/{id}',['' => 'cuti.show.umc','uses' => 'CutiController@showFormUmc']);

	Route::get('/claim/report',[
		'as'=>'claim.report',
		'uses'=>'CutiRecordController@claimReport'
	]);

	Route::get('/claim/show/{id}',[
		'as' => 'claim.show',
		'uses'	=> 'CutiRecordController@showUserRecord'
	]);

});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'user','as' => 'user.','middleware' => 'auth'],function(){

	Route::resource('/profile','UserProfileController',['only' => ['show','update']]);

	Route::get('/cuti/status/',['as' => 'cuti.status','uses' => 'CutiController@cutiStatus']);

	Route::resource('about','UserAboutController');

	Route::resource('cuti','CutiController');

	Route::get('/claim/cuti',[
		'as'	=>	'claim.cuti',
		'uses'	=>	'CutiRecordController@claim'
	]);

});

Route::get('/test',function ()
{
	$start = Carbon\Carbon::createFromFormat('d-m-Y','03-11-2017');

	$end = Carbon\Carbon::createFromFormat('d-m-Y','15-11-2017');

	$diff = $start->copy()->subDay()->diffInDays($end);

	$diffWithoutWeekend = $start->copy()->subDay()->diffInDaysFiltered(function(Carbon\Carbon $date) {
		return !$date->isWeekend();
		}, $end);

	return $diffWithoutWeekend;
});