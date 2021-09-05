<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';

    protected $fillable =  
    [
        'id',
        'user_id',
        'name',
        'amount',
        'kind_id'
    ];
}
