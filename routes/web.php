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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WebController@dashboard');
Route::get('/login', 'WebController@login');
Route::get('/register', 'WebController@register');
Route::get('/signature', 'WebController@signature');
Route::get('/mail', 'WebController@mail');
Route::get('/vidcon', 'WebController@vidcon');
Route::get('/akun', 'AkunController@index');
Route::post('/sendmail', 'WebController@sendmail');
Route::post('/biodata', 'AkunController@update');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get("janco", function () {
    $user = Zoom::user();

    dd($user);
});
