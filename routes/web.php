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

//Route::get('/home', 'HomeController@index')->name('view_stage_one');
Route::get('/home', 'ProposalController@index')->name('home');;
Route::get('dashboard','ProposalController@dashboard')->name('dashboard');

//store proposal to db
//Route::get('/store', 'ProposalController@store');
//display them

Route::get('/products', 'ProposalController@index');
Route::get('/admin','AdminController@index');
Route::post('save-proposal','ProposalController@store')->name('proposal');

Route::get('view_proposals','ProposalController@view_proposals')->name('view_proposals');

Route::post('store','ProposalController@store')->name('store');

//Route::get('view','ProposalController@view_proposal');
Route::get('proposal_details/{id}','ProposalController@proposal_details')->name('proposal_details');



Route::get('rejected','ProposalController@rejected')->name('rejected');
Route::get('accepted','ProposalController@accepted')->name('accepted');

Route::get('/reject/{id}','ProposalController@reject_proposal');
Route::get('/accept-stage-one/{id}','ProposalController@accept');

Route::get('stage_one','ProposalController@stage_one')->name('stage_one');

Route::get('details_stage_one/{id}','ProposalController@details_stage_one')->name('details_stage_one');


Route::get('reject_stage_one/{id}','ProposalController@reject_stage_one')->name('reject_stage_one');
Route::get('accept_stage_two/{id}','ProposalController@accept_stage_two')->name('accept_stage_two');

Route::get('stage_two','ProposalController@stage_two')->name('stage_two');
Route::get('details_stage_two/{id}','ProposalController@details_stage_two')->name('details_stage_two');

Route::get('reject_stage_two/{id}','ProposalController@reject_stage_two')->name('reject_stage_two');
Route::get('accept_stage_final/{id}','ProposalController@accept_stage_final')->name('accept_stage_final');

//Route::get('/notification', function () {
//    $noti =DB::table('proposals')
//        ->where('status','not approved')
//        ->count();
//    return $noti;
//});
//Route::get('unread','ProposalController@unread')->name('unread');