<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',

        'product_name',
        'product_slug',
        'product_image',

        'price',
        'discount',
        'base_price',
        'final_price',
        'quantity',

        'purchase_type',

        'glass_id',
        'glass_value_id',
        'glass_name',
        'glass_value_name',
        'glass_value_price',

        'glass_value_lens_index_id',
        'glass_value_lens_index_name',
        'glass_value_lens_index_price',

        'prescription_image',
        'right_eye',
        'left_eye',
        'pd',
    ];

    protected $casts = [
        'right_eye' => 'array',
        'left_eye' => 'array',

        'price' => 'decimal:2',
        'base_price' => 'decimal:2',
        'final_price' => 'decimal:2',

        'glass_value_price' => 'decimal:2',
        'glass_value_lens_index_price' => 'decimal:2',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
