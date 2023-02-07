<?php

namespace App\Console\Commands\Agora;

use Illuminate\Console\Command;

class Order extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agora:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process auction orders';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
