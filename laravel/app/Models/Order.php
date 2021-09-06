<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'Order';

    public const STATUS_CREATE = 1;
    public const STATUS_MADE = 2;
    public const STATUS_SEND = 3;
    public const STATUS_FINISHED = 4;

    protected $fillable =
    [
        'id',
        'user_id',
        'table_number',
        'product_id',
        'count',
        'status'
    ];
}
