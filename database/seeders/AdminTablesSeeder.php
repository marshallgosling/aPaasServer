<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        \Encore\Admin\Auth\Database\Menu::truncate();
        \Encore\Admin\Auth\Database\Menu::insert(
            [
                [
                    "parent_id" => 0,
                    "order" => 1,
                    "title" => "Dashboard",
                    "icon" => "fa-bar-chart",
                    "uri" => "/",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 23,
                    "title" => "Admin",
                    "icon" => "fa-tasks",
                    "uri" => "",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 2,
                    "title" => "Ecommerce",
                    "icon" => "fa-balance-scale",
                    "uri" => NULL,
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 10,
                    "title" => "Entertainment",
                    "icon" => "fa-futbol-o",
                    "uri" => NULL,
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 14,
                    "title" => "Tools",
                    "icon" => "fa-gears",
                    "uri" => NULL,
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 19,
                    "title" => "Demo",
                    "icon" => "fa-archive",
                    "uri" => NULL,
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 24,
                    "title" => "Users",
                    "icon" => "fa-users",
                    "uri" => "auth/users",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 25,
                    "title" => "Roles",
                    "icon" => "fa-user",
                    "uri" => "auth/roles",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 26,
                    "title" => "Permission",
                    "icon" => "fa-ban",
                    "uri" => "auth/permissions",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 27,
                    "title" => "Menu",
                    "icon" => "fa-bars",
                    "uri" => "auth/menu",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 28,
                    "title" => "Operation log",
                    "icon" => "fa-history",
                    "uri" => "auth/logs",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 5,
                    "order" => 15,
                    "title" => "Log viewer",
                    "icon" => "fa-database",
                    "uri" => "logs",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 5,
                    "order" => 18,
                    "title" => "Config",
                    "icon" => "fa-toggle-on",
                    "uri" => "config",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 22,
                    "order" => 22,
                    "title" => "Channel",
                    "icon" => "fa-bars",
                    "uri" => "demo/channel",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 6,
                    "order" => 20,
                    "title" => "Auction",
                    "icon" => "fa-bars",
                    "uri" => "demo/auction",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 6,
                    "order" => 21,
                    "title" => "Bid",
                    "icon" => "fa-bars",
                    "uri" => "demo/bid",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 5,
                    "order" => 16,
                    "title" => "Redis manager",
                    "icon" => "fa-database",
                    "uri" => "redis",
                    "permission" => NULL
                ],
                
                [
                    "parent_id" => 4,
                    "order" => 13,
                    "title" => "Room",
                    "icon" => "fa-building-o",
                    "uri" => "ent/room",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 4,
                    "order" => 11,
                    "title" => "User",
                    "icon" => "fa-user-plus",
                    "uri" => "ent/users",
                    "permission" => NULL
                ],
                
                [
                    "parent_id" => 3,
                    "order" => 3,
                    "title" => "Users",
                    "icon" => "fa-user-plus",
                    "uri" => "ecommerce/users",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 3,
                    "order" => 5,
                    "title" => "Room",
                    "icon" => "fa-home",
                    "uri" => "ecommerce/rooms",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 3,
                    "order" => 9,
                    "title" => "Commodity",
                    "icon" => "fa-product-hunt",
                    "uri" => "ecommerce/commodity",
                    "permission" => NULL
                ],
                
                [
                    "parent_id" => 3,
                    "order" => 7,
                    "title" => "Auction",
                    "icon" => "fa-adn",
                    "uri" => "ecommerce/auction",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 3,
                    "order" => 6,
                    "title" => "RoomStreams",
                    "icon" => "fa-bars",
                    "uri" => "ecommerce/room/stream",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 3,
                    "order" => 8,
                    "title" => "Auction Bids",
                    "icon" => "fa-money",
                    "uri" => "ecommerce/auction/bid",
                    "permission" => NULL
                ],
                
                [
                    "parent_id" => 5,
                    "order" => 17,
                    "title" => "Scheduling",
                    "icon" => "fa-clock-o",
                    "uri" => "scheduling",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 3,
                    "order" => 4,
                    "title" => "Address",
                    "icon" => "fa-wpforms",
                    "uri" => "ecommerce/address",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 4,
                    "order" => 12,
                    "title" => "Songs",
                    "icon" => "fa-music",
                    "uri" => "ent/songs",
                    "permission" => NULL
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Permission::truncate();
        \Encore\Admin\Auth\Database\Permission::insert(
            [
                [
                    "name" => "All permission",
                    "slug" => "*",
                    "http_method" => "",
                    "http_path" => "*"
                ],
                [
                    "name" => "Dashboard",
                    "slug" => "dashboard",
                    "http_method" => "GET",
                    "http_path" => "/"
                ],
                [
                    "name" => "Login",
                    "slug" => "auth.login",
                    "http_method" => "",
                    "http_path" => "/auth/login\r\n/auth/logout"
                ],
                [
                    "name" => "User setting",
                    "slug" => "auth.setting",
                    "http_method" => "GET,PUT",
                    "http_path" => "/auth/setting"
                ],
                [
                    "name" => "Auth management",
                    "slug" => "auth.management",
                    "http_method" => "",
                    "http_path" => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs"
                ],
                [
                    "name" => "Logs",
                    "slug" => "ext.log-viewer",
                    "http_method" => "",
                    "http_path" => "/logs*"
                ],
                [
                    "name" => "Admin Config",
                    "slug" => "ext.config",
                    "http_method" => "",
                    "http_path" => "/config*"
                ],
                [
                    "name" => "Redis Manager",
                    "slug" => "ext.redis-manager",
                    "http_method" => "",
                    "http_path" => "/redis*"
                ],
                [
                    "name" => "Scheduling",
                    "slug" => "ext.scheduling",
                    "http_method" => "",
                    "http_path" => "/scheduling*"
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Role::truncate();
        \Encore\Admin\Auth\Database\Role::insert(
            [
                [
                    "name" => "Administrator",
                    "slug" => "administrator"
                ]
            ]
        );

        // pivot tables
        DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert(
            [
                [
                    "role_id" => 1,
                    "menu_id" => 2
                ]
            ]
        );

        DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert(
            [
                [
                    "role_id" => 1,
                    "permission_id" => 1
                ]
            ]
        );

        // finish
    }
}
