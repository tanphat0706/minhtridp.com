<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    const ENABLE = 1;
    const DISABLE = 0;

    protected $table = 'carousel';
    protected $fillable = [
        'title',
        'img_url',
        'description',
        'order_number',
        'status',
        'created_at',
        'updated_at',
    ];
    /**
     * Create select box chose list status
     */
    public function createListStatus()
    {
        $status = array(
            User::DISABLE => trans('system.disable'),
            User::ENABLE => trans('system.enable')
        );
        return $status;
    }

    public function getStatus()
    {
        return $this->status == static::ENABLE ? trans('system.enable') : trans('system.disable');
    }

    public function getStatusColor()
    {
        return $this->status == static::ENABLE ? 'success' : 'default';
    }
}
