<?php

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
    $router->resource('/ecommerce/auction', 'AuctionController')->names('ecommerce.auction');
    $router->resource('/ecommerce/channel', 'ChannelController')->names('ecommerce.channel');
    $router->resource('/ecommerce/bid', 'BidController')->names('ecommerce.bid');

    $router->resource('/ecommerce/rooms', 'Ecommerce\RoomController')->names('ecommerce.room');
    $router->resource('/ecommerce/commodity', 'Ecommerce\CommodityController')->names('ecommerce.commodity');
    $router->resource('/ecommerce/commodityimages', 'Ecommerce\CommodityImageController')->names('ecommerce.commodity.image');

    $router->resource('/ent/users', 'Ent\UserController')->names('ent.users');
    $router->resource('/ent/room', 'Ent\RoomController')->names('ent.room');
    
});
