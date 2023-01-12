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
    

    $router->resource('/ecommerce/rooms', 'Ecommerce\RoomController')->names('ecommerce.room');
    $router->resource('/ecommerce/commodity', 'Ecommerce\CommodityController')->names('ecommerce.commodity');
    $router->resource('/ecommerce/commodityimages', 'Ecommerce\CommodityImageController')->names('ecommerce.commodity.image');

    $router->resource('/ecommerce/auction', 'Ecommerce\AuctionController')->names('ecommerce.auction');
    $router->resource('/ecommerce/auctioncommodity', 'Ecommerce\AuctionCommodityController')->names('ecommerce.auction.commodity');

    $router->resource('/ecommerce/room/stream', 'Ecommerce\RoomCommandController')->names('ecommerce.room.stream');

    $router->resource('/ent/users', 'Ent\UserController')->names('ent.users');
    $router->resource('/ent/room', 'Ent\RoomController')->names('ent.room');


    $router->resource('/demo/auction', 'AuctionController')->names('demo.auction');
    $router->resource('/demo/channel', 'ChannelController')->names('demo.channel');
    $router->resource('/demo/bid', 'BidController')->names('demo.bid');
    
});
