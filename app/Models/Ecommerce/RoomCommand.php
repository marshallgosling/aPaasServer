<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCommand extends Model
{
    use HasFactory;
    public const STATUS_STOPED = 0;
    public const STATUS_RUNNING = 1;
    public const STATUS_CLOSE = 9;

    protected $table = 'fa_room_command';

    protected $fillable = [
        'id',
        'name',
        'data',
        'room_id',
        'status',
    ];

    protected $casts = [
        'data' => 'json',
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, "room_id", 'id');
    }
}
