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

 
 //Fontend
 Route::get('/', 'HomeController@index');
 Route::get('/vietnam-visa', 'HomeController@vietnam_visa')->name('vietnam.visa');
Route::get('/transportation', 'HomeController@transportation')->name('transportation');
Route::get('/accommodation', 'HomeController@accommodation')->name('accommodation');
Route::get('/tour', 'HomeController@tour')->name('tour');
Route::get('/airport-transfer', 'HomeController@airport_transfer')->name('airport.transfer');
Route::post('/save-trans', 'HomeController@save_trans')->name('save.trans');
Route::get('/onepay/{code1}/{code2}', 'HomeController@paymenthotelform')->name('payment.trans');
Route::get('/trans-confirm/{code1}/{code2}', 'HomeController@trans_confirm')->name('trans.confirm');
Route::post('/onepay/payment/onepay', 'HomeController@payment_form_onepay')->name('payment.onpey.post');
Route::get('/airport-transfer/dr', 'HomeController@airport_transfer_dr')->name('airport.transfer.dr');
Route::post('/reserved', 'HomeController@reserve_load')->name('reserve.load');
Route::get('/transportation-test', 'HomeController@transportationTest')->name('transportation.test');

