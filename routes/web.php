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


Route::get('/indexAdmin', 'VoitureController@indexAdmin');


Route::get('/addVoiture', 'VoitureController@addVoiture');





Route::get('/addMarque', 'VoitureController@addMarque');

Route::get('/addModele', 'VoitureController@addModele');

Route::get('/showReservations', 'VoitureController@showReservations');
Route::get('/showMarques', 'VoitureController@showMarques');

Route::post('/storeVoiture', 'VoitureController@storeVoiture')->name('storeVoiture');

Route::post('/storeMarque', 'VoitureController@storeMarque')->name('storeMarque');
Route::post('/deleteMarque', 'VoitureController@deleteMarque')->name('deleteMarque');
Route::post('/storeModele', 'VoitureController@storeModele')->name('storeModele');
Route::post('/deleteModele', 'VoitureController@deleteModele')->name('deleteModele');
Route::get('/confirmReservation/{id}', 'VoitureController@confirmReservation')->name('confirmReservation');
Route::get('/deleteReservation/{id}', 'VoitureController@deleteReservation')->name('deleteReservation');
Route::get('/deleteVoiture/{id}', 'VoitureController@deleteVoiture')->name('deleteVoiture');


Route::get('/indexUser', 'UserController@indexUser')->name('indexUser');
Route::get('/indexVoitures', 'UserController@indexVoitures')->name('indexVoitures');
Route::post('/searchVoitures', 'UserController@searchVoitures')->name('searchVoitures');
Route::get('/reserver/{id}', 'UserController@reserver')->name('reserver');

Route::post('/storeReservation', 'UserController@storeReservation')->name('storeReservation');
Route::post('/getModeles', 'UserController@getModeles')->name('getModeles');


Route::get('/voituresAdmin', 'VoitureController@voituresAdmin')->name('voituresAdmin');