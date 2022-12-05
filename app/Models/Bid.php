<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    public const STATUS_WAITING = 0;
    public const STATUS_VALID = 1;
    public const STATUS_SORRY = 2;
    public const STATUS_CLOSE = 9;

    protected $table = 'bid';

    protected $fillable = [
        'id',
        'uid',
        'amount',
        'auction_id',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id', 'id');
    }

}
