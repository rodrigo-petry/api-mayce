<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->name('api.')->group(function () {

    Route::prefix('/partner-requests')->group(function () {
        Route::get('/', 'PartnerRequestController@index')->name('partner_requests');
        Route::get('/{id}', 'PartnerRequestController@show')->name('partner_profile');

        Route::post('/', 'PartnerRequestController@store')->name('store_partner');
        Route::put('/{id}', 'PartnerRequestController@update')->name('update-partner');

        Route::delete('/{id}', 'PartnerRequestController@delete')->name('delete-partner');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', 'UsersController@index')->name('users');
        Route::get('/{id}', 'UsersController@show')->name('user_detail');

        Route::post('/', 'UsersController@store')->name('store_user');
        Route::put('/{id}', 'UsersController@update')->name('update_user');

        Route::delete('/{id}', 'UsersController@delete')->name('delete_user');
    });
});
