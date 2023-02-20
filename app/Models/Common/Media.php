<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    public const STATUS_DEFAULT = 0;
    public const STATUS_PROCESSING = 1;
    public const STATUS_READY = 2;
    public const STATUS_DELETED = 9;

    protected $table = 'media';

    protected $fillable = [
        'id',
        'name',
        'video',
        'audio',
        'source',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        
    ];
}
