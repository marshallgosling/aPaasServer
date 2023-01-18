<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChinaArea extends Model
{
    use HasFactory;

    public const FIELDS = ['code','name'];
    
    protected $table = 'china_area';

    protected $fillable = [
        'id',
        'parent_id',
        'code',
        'name'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];

    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public static function getByParentId($id, $fields=['*'])
    {
        return self::where('parent_id', $id)->get($fields);
    }

    public function getChildren($fields=['*'])
    {
        return ChinaArea::where('parent_id', $this->id)->get($fields);
    }

}
