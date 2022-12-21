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
