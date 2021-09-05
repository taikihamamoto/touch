<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    protected $table = 'kind';

    protected $fillable =  
    [
        'id',
        'user_id',
        'name'
    ];
}
