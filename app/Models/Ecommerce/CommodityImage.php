<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommodityImage extends Model
{
    use HasFactory;

    protected $table = 'fa_commodity_images';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'image_url',
        'commodity_id',
        'order_no'
    ];

    protected $hidden = [
        'order_no'
    ];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class, 'commodity_id', 'id')->orderBy('order_no', 'desc');
    }
}
