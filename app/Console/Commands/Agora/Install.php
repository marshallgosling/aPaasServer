<?php

namespace App\Console\Commands\Agora;

use Illuminate\Console\Command;
use Encore\Admin\Auth\Database\Menu;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agora:install {menu?} {--showMenu}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'agora:install 
                                --showMenu :  Show the existing Menu with MenuID
                                menuId : The root menu Id';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('showMenu')) {
            $id = $this->argument('menu');

            $menu = Menu::where('parent_id', $id)->orderBy("order")->lazy()->toArray();

            print_r($menu);
        }
        else $this->setupMenu();

    }

    private function setupMenu()
    {
        $root = json_decode($this->root, true);
        foreach ($root as $item)
        {
            Menu::where('parent_id', $item['id'])->delete();
            Menu::find($item['id'])->delete();
        }
        
        Menu::insert(json_decode($this->root, true));
        Menu::insert(json_decode($this->ecommerce, true));
        Menu::insert(json_decode($this->ent, true));
        Menu::insert(json_decode($this->tools, true));
        Menu::insert(json_decode($this->demo, true));

        // add role to menu.
        //Menu::find(2)->roles()->save(Role::first());
    }


    private $ecommerce = <<<EOF
    [{"id":19,"parent_id":11,"order":3,"title":"Users","icon":"fa-user-plus","uri":"ecommerce\/users","permission":null,"created_at":"2022-12-29 07:54:37","updated_at":"2023-01-12 16:49:44"},{"id":28,"parent_id":11,"order":4,"title":"Address","icon":"fa-wpforms","uri":"ecommerce\/address","permission":null,"created_at":"2023-01-13 12:14:20","updated_at":"2023-01-13 12:14:26"},{"id":20,"parent_id":11,"order":5,"title":"Room","icon":"fa-home","uri":"ecommerce\/rooms","permission":null,"created_at":"2023-01-03 09:13:48","updated_at":"2023-01-13 12:14:26"},{"id":24,"parent_id":11,"order":6,"title":"RoomStreams","icon":"fa-bars","uri":"ecommerce\/room\/stream","permission":null,"created_at":"2023-01-11 16:54:49","updated_at":"2023-01-13 12:14:26"},{"id":23,"parent_id":11,"order":7,"title":"Auction","icon":"fa-adn","uri":"ecommerce\/auction","permission":null,"created_at":"2023-01-09 18:00:34","updated_at":"2023-01-13 12:14:26"},{"id":25,"parent_id":11,"order":8,"title":"Auction Bids","icon":"fa-money","uri":"ecommerce\/auction\/bid","permission":null,"created_at":"2023-01-12 14:50:01","updated_at":"2023-01-13 12:14:26"},{"id":21,"parent_id":11,"order":9,"title":"Commodity","icon":"fa-product-hunt","uri":"ecommerce\/commodity","permission":null,"created_at":"2023-01-04 11:45:38","updated_at":"2023-01-13 12:14:26"}]
    EOF;

    private $ent = <<<EOF
    [{"id":17,"parent_id":15,"order":11,"title":"User","icon":"fa-user-plus","uri":"ent\/users","permission":null,"created_at":"2022-12-21 07:46:00","updated_at":"2023-01-13 16:36:37"},{"id":29,"parent_id":15,"order":12,"title":"Songs","icon":"fa-music","uri":"ent\/songs","permission":null,"created_at":"2023-01-13 16:36:05","updated_at":"2023-01-13 16:36:37"},{"id":16,"parent_id":15,"order":13,"title":"Room","icon":"fa-building-o","uri":"ent\/room","permission":null,"created_at":"2022-12-21 07:45:40","updated_at":"2023-01-13 16:36:37"}]
    EOF;

    private $tools = <<<EOF
    [{"id":8,"parent_id":18,"order":15,"title":"Log viewer","icon":"fa-database","uri":"logs","permission":null,"created_at":"2022-12-09 06:28:28","updated_at":"2023-01-13 16:36:37"},{"id":14,"parent_id":18,"order":16,"title":"Redis manager","icon":"fa-database","uri":"redis","permission":null,"created_at":"2022-12-09 06:48:30","updated_at":"2023-01-13 16:36:37"},{"id":27,"parent_id":18,"order":17,"title":"Scheduling","icon":"fa-clock-o","uri":"scheduling","permission":null,"created_at":"2023-01-12 16:54:57","updated_at":"2023-01-13 16:36:37"},{"id":9,"parent_id":18,"order":18,"title":"Config","icon":"fa-toggle-on","uri":"config","permission":null,"created_at":"2022-12-09 06:28:34","updated_at":"2023-01-13 16:36:37"}]
    EOF;

    private $demo = <<<EOF
    [{"id":12,"parent_id":22,"order":20,"title":"Auction","icon":"fa-bars","uri":"demo\/auction","permission":null,"created_at":"2022-12-09 06:47:39","updated_at":"2023-01-13 16:36:37"},{"id":13,"parent_id":22,"order":21,"title":"Bid","icon":"fa-bars","uri":"demo\/bid","permission":null,"created_at":"2022-12-09 06:47:51","updated_at":"2023-01-13 16:36:37"},{"id":10,"parent_id":22,"order":22,"title":"Channel","icon":"fa-bars","uri":"demo\/channel","permission":null,"created_at":"2022-12-09 06:46:40","updated_at":"2023-01-13 16:36:37"}]
    EOF;


    private $root = <<<ROOT
    [{"id":11,"parent_id":0,"order":2,"title":"Ecommerce","icon":"fa-balance-scale","uri":null,"permission":null,"created_at":"2022-12-09 06:47:23","updated_at":"2023-01-12 16:49:44"},{"id":15,"parent_id":0,"order":10,"title":"Entertainment","icon":"fa-futbol-o","uri":null,"permission":null,"created_at":"2022-12-21 07:45:11","updated_at":"2023-01-13 12:14:26"},{"id":18,"parent_id":0,"order":14,"title":"Tools","icon":"fa-gears","uri":null,"permission":null,"created_at":"2022-12-21 08:46:55","updated_at":"2023-01-13 16:36:37"},{"id":22,"parent_id":0,"order":19,"title":"Demo","icon":"fa-archive","uri":null,"permission":null,"created_at":"2023-01-05 16:35:21","updated_at":"2023-01-13 16:36:37"}]
    ROOT;
}
