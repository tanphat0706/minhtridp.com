<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
    ];
}
