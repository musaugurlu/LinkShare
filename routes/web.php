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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();
Route::get('logout', function(Request $request) {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingController@index')->name('settings');
    Route::get('/links', 'LinkController@index')->name('links');
    Route::get('/linkgroups','LinkGroupController@index')->name('linkgroups');
    Route::get('/linkgroups/{id}','LinkGroupController@show')->name('onelinkgroup');
    Route::get('/links/{id}','LinkController@show')->name('onelink');
});

