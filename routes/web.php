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

// Auth::routes();
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::get('/', 'DaftarVpsController@index')->name('daftar');
Route::get('lihatpengguna','DaftarVpsController@lihatpengguna')->name('lihatpengguna');
Route::post('daftar', 'DaftarVpsController@store')->name('daftar.store');
Route::get('ipakses', 'DaftarVpsController@ipakses')->name('ipakses');

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('destroy/{id}', 'HomeController@destroy')->name('destroy');
