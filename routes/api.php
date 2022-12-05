<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix("v1")->namespace('App\Http\Controllers\Api')->group(function () {
    Route::get('rtctoken', 'TokenController@rtctoken');
    Route::get('rtmtoken', 'TokenController@rtmtoken');
    Route::get('edutoken', 'TokenController@edutoken');

    Route::post('auction/bid', 'AuctionController@bid');
    Route::get('auction', 'AuctionController@all');
    Route::get('channels', 'AuctionController@channels');
});
