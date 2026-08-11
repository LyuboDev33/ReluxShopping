<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELLED = 'cancelled';

    const ORDER_STATUSES = [
        self::STATUS_PENDING    => 'Изчакваща',
        self::STATUS_PROCESSING => 'В процес на обработка',
        self::STATUS_DELIVERED  => 'Доставена',
        self::STATUS_CANCELLED  => 'Отменена',
    ];

    protected $fillable = [
        'order_number',
        'first_name',
        'last_name',
        'phone',
        'email',

        'delivery_method',
        'city',
        'personal_address',

        'courier',
        'office_list',

        'request_invoice',

        'company_name',
        'company_mol',
        'company_bulstat',
        'company_address',

        'notes',

        'subtotal',
        'promo_code',
        'delivery_price',
        'total',

        'payment_option',
        'status',
    ];

    protected $casts = [
        'request_invoice' => 'boolean',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }


}
