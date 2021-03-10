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

Route::get('/', 'WebsiteController@index')->name('/');
Route::get('/lottery-results', 'WebsiteController@lotteryResults')->name('/lottery-results');
// Route::get('/contact', 'WebsiteController@contactUs')->name('/contact');

Route::get('/generatelottery', 'WebsiteController@generateLottery')->name('/generatelottery');

Auth::routes();

Route::get('register', function () {
    return abort(404);
})->name('register');

Route::get('password/reset', function () {
    return abort(404);
})->name('password/reset');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::post('/save-lottery','HomeController@saveLottery')->name('save-lottery');
});