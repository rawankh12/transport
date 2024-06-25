<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_Goods_Request extends Model
{
    use HasFactory;

    protected $table='ship_goods-request';
    protected $fillable = [
        'user_id',
        'trip_id',
        'section_id',
        'image_goods',
        'quantity',
        'description'
    ];

    /**
     * Get the user that owns the Ship_Goods_Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user that owns the Ship_Goods_Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo(Trips::class, 'trip_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
