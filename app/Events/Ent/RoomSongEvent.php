<?php

namespace App\Events\Ent;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RoomSongEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    private $song;
    private $room;
    private $user;

    private $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($room, $song, $user, $action='add')
    {
        $this->action = $action;
        $this->room = $room;
        $this->user = $user;
        $this->song = $song;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('RoomSong');
    }
}
