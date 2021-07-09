<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'Order';

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
