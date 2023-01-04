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
Route::group([
    'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers\Ecommerce',
    'as'=>'account.',
    'prefix'=>'account'
], function ($router) {
    Route::post('signin', 'AuthController@login')->name('login');
    Route::get('signout', 'AuthController@logout')->name('logout');
    Route::get('refresh', 'AuthController@refresh')->name('refresh');
    Route::get('me', 'AuthController@me')->name('auth.me');
});

Route::group([
    'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers\Ecommerce',
    'as'=>'profile.',
    'prefix'=>'profile'
], function ($router) {
    Route::get('self', 'ProfileController@self')->name('get');
    Route::patch('self', 'ProfileController@edit')->name('patch');
    Route::get('{userid}', 'ProfileController@user')->name('user');
    Route::post('follow', 'ProfileController@follow')->name('follow');
    Route::delete('follow', 'ProfileController@unfollow')->name('unfollow');
});

Route::group([
    'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers\Ecommerce',
    'as'=>'commodity.',
    'prefix'=>'commodity'
], function ($router) {
    Route::get('list', 'CommodityController@list')->name('list');
    
    
});

Route::group([
    'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers\Ecommerce',
    'as'=>'room.',
    'prefix'=>'room'
], function ($router) {
    Route::get('list', 'RoomController@list')->name('get');
    Route::get('{roomNo}', 'RoomController@info')->name('info');
    Route::patch('create', 'RoomController@create')->name('create');
    
});


Route::prefix("v1")->namespace('App\Http\Controllers\Api')->group(function () {
    Route::get('rtctoken', 'TokenController@rtctoken');
    Route::get('rtmtoken', 'TokenController@rtmtoken');
    Route::get('edutoken', 'TokenController@edutoken');

    Route::post('auction/bid', 'AuctionController@bid');
    Route::get('auction', 'AuctionController@all');
    Route::get('channels', 'AuctionController@channels');
    Route::get('channel/{channelid}', 'AuctionController@channel');

    Route::post('auction/sync', 'AuctionController@sync');

});


Route::prefix("users")->namespace('App\Http\Controllers\Ent')->group(function () {
    Route::get('login', 'UsersController@login');
    Route::get('getToken', 'UsersController@getToken');
    Route::get('getUserInfo', 'UsersController@getUserInfo');
    Route::get('cancellation', 'UsersController@cancellation');
    Route::get('verificationCode', 'UsersController@verificationCode');
});

Route::prefix("roomInfo")->namespace('App\Http\Controllers\Ent')->group(function () {
    Route::post('roomList', 'RoomController@roomList');
    Route::get('getRoomInfo', 'RoomController@getRoomInfo');
    Route::post('createRoom', 'RoomController@createRoom');
    Route::post('updateRoom', 'RoomController@updateRoom');

    Route::get('outRoom', 'RoomController@outRoom');
    Route::get('closeRoom', 'RoomController@closeRoom');

    Route::get('onSeat', 'RoomController@onSeat');
    Route::get('outSeat', 'RoomController@outSeat');

    Route::get('getRoomNum', 'RoomController@getRoomNum');

});

Route::prefix("roomUsers")->namespace('App\Http\Controllers\Ent')->group(function () {
    Route::get('ifQuiet', 'UsersController@ifQuiet');
    Route::get('openCamera', 'UsersController@openCamera');
});