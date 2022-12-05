<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Channel extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 0;
    public const STATUS_ONLINE = 1;
    public const STATUS_OFFLINE = 2;

    protected $table = 'channel';

    protected $fillable = [
        'id',
        'channelid',
        'owner',
        'appid',
        'status',
        'commands'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        
    ];

    public function enable()
    {
        if ($this->status == 0) {
            $this->status = 1;
            $this->save();
        }
    }
}
