<?php

namespace App\Listeners\Ent;

use App\Events\Ent\RoomSongEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RoomSongListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Ent\RoomSongEvent  $event
     * @return void
     */
    public function handle(RoomSongEvent $event)
    {
        //
    }


    public function add()
    {

    }

    public function del()
    {
        
    }
}
