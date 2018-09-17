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
    return view('welcome');
});

Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ProposalController@index')->name('home');;

//store proposal to db
//Route::get('/store', 'ProposalController@store');
//display them

Route::get('/products', 'ProposalController@index');
Route::get('/admin','AdminController@index');
Route::post('save-proposal','ProposalController@store')->name('proposal');

Route::get('view_proposals','ProposalController@view_proposals')->name('view_proposals');

Route::post('store','ProposalController@store')->name('store');

//Route::get('view','ProposalController@view_proposal');