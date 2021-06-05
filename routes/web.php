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

Route::get('/', 'WebController@dashboard');
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', 'DashboardController@index');

    Route::group(['prefix' => 'signatures'], function () {
        Route::get('/', 'SignatureController@index')->name('signatures.index');
        Route::post('/', 'SignatureController@store')->name('signatures.store');
        Route::put('/{id}', 'SignatureController@update')->name('signatures.update');
        Route::get('/{id}', 'SignatureController@download')->name('signatures.download');
    });

    Route::group(['prefix' => 'conferences', 'middleware' => 'role:admin'], function () {
        Route::get('/', 'ConferenceController@index')->name('conferences.index');
        Route::get('/create', 'ConferenceController@create')->name('conferences.create');
        Route::post('/', 'ConferenceController@store')->name('conferences.store');
        Route::delete('/{id}', 'ConferenceController@destroy')->name('conferences.destroy');
    });

    Route::group(['prefix' => 'conferencespublic'], function() {
        Route::get('/', 'ConferenceController@indexPublic')->name('conferencesPublic.index');
    });

    Route::get('/mails', 'WebController@mail')->name('mails.index');


    Route::resource('accounts', "AccountController");

    Route::post('/sendmails', 'WebController@sendmail')->name('mails.send');

    Route::resource('attendences', "AttendenceController");
    Route::get('/attendences/{id}/presensi', 'AttendenceController@presensi')->name('attendences.presensi');
    Route::post('/attendences/{id}/presensi', 'AttendenceController@presensiStore')->name('attendences.presensiStore');
});

Route::get('/checkbarcode/{id}', 'SignatureController@checkBarcode')->name('signatures.checkBarcode');
