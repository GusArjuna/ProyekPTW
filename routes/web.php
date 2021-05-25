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


    Route::get('/signatures', 'WebController@signature')->name('signatures.index');
    Route::get('/mails', 'WebController@mail')->name('mails.index');
    Route::get('/videoconferences', 'WebController@vidcon')->name('videoconferences.index');

    Route::resource('accounts', "AccountController");

    Route::post('/sendmails', 'WebController@sendmail');
});
