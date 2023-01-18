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
    Route::get('{item}', 'CommodityController@get')->name('get');
    Route::patch('item', 'CommodityController@item')->name('item');
    
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
    Route::post("stream", 'RoomController@stream')->name('stream');
    Route::get("stream/list", 'RoomController@listStream')->name('stream.list');
});

Route::group([
    'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers\Ecommerce',
    'as'=>'auction.',
    'prefix'=>'auction'
], function ($router) {
    Route::get('room/{roomNo}', 'AuctionController@list')->name('list');
    Route::get('{auctionId}', 'AuctionController@detail')->name('detail');
    Route::post('bid', 'AuctionController@bid')->name('bid');
});

Route::group([
    'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers\Ecommerce',
    'as'=>'address.',
    'prefix'=>'address'
], function ($router) {
    Route::get('self', 'AddressController@list')->name('self');
    Route::get('country', 'AddressController@country')->name('country');
    Route::get('province', 'AddressController@province')->name('province');
    Route::get('city/{id}', 'AddressController@city')->name('city');
    Route::get('district/{id}', 'AddressController@district')->name('district');
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
