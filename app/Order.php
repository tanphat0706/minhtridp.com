<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order_feedback';
    protected $fillable = [
        'user_id',
        'order_code',
        'content',
        'status',
        'result',
        'comment',
        'created_at',
        'updated_at',
    ];
}
