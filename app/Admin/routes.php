<?php

use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('/ecommerce/users', 'Ecommerce\UserController')->names('ecommerce.user');
    
    $router->resource('/ecommerce/room/stream', 'Ecommerce\RoomCommandController')->names('ecommerce.room.stream');
    $router->resource('/ecommerce/rooms', 'Ecommerce\RoomController')->names('ecommerce.room');
    
    $router->resource('/ecommerce/commodity/images', 'Ecommerce\CommodityImageController')->names('ecommerce.commodity.image');
    $router->resource('/ecommerce/commodity', 'Ecommerce\CommodityController')->names('ecommerce.commodity');
    
    $router->resource('/ecommerce/auction/commodity', 'Ecommerce\AuctionCommodityController')->names('ecommerce.auction.commodity');
    $router->resource('/ecommerce/auction/bid', 'Ecommerce\AuctionBidController')->names('ecommerce.auction.bid');
    $router->resource('/ecommerce/auction', 'Ecommerce\AuctionController')->names('ecommerce.auction');
    
    $router->resource('/ecommerce/order', 'Ecommerce\OrderController')->names('ecommerce.order');

    $router->resource('/ecommerce/address', 'Ecommerce\AddressController')->names('ecommerce.address');

    $router->resource('/ent/users', 'Ent\UserController')->names('ent.users');
    $router->resource('/ent/room', 'Ent\RoomController')->names('ent.room');
    $router->resource('/ent/songs', 'Ent\SongController')->names('ent.songs');

    $router->resource('/demo/auction', 'AuctionController')->names('demo.auction');
    $router->resource('/demo/channel', 'ChannelController')->names('demo.channel');
    $router->resource('/demo/bid', 'BidController')->names('demo.bid');
    
});
