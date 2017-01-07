<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    const ENABLE = 1;
    const DISABLE = 0;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'image_url',
        'thumbs_img',
        'status',
        'order_number',
        'description',
        'home_description',
        'created_at',
        'updated_at',
    ];

    public function images()
    {
        return $this->hasMany('App\Images', 'category_id', 'id');
    }
    public function properties()
    {
        return $this->hasMany('App\Property', 'category_id', 'id');
    }
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
