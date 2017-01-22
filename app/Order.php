<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STEP_0 = 0;
    const STEP_1 = 1;
    const STEP_2 = 2;

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
    public function getStatus()
    {
        if($this->status == static::STEP_0){
            return 'Chưa xử lý';
        }elseif($this->status == static::STEP_1){
            return 'Đang xử lý';
        }elseif($this->status == static::STEP_2){
            return 'Đã xử lý';
        }
    }
    public function getStatusColor()
    {
        if($this->status == static::STEP_0){
            return 'default';
        }elseif($this->status == static::STEP_1){
            return 'warning';
        }elseif($this->status == static::STEP_2){
            return 'success';
        }
    }
    public function getOrderByCode($order_code){
        $order = Order::where('order_code',$order_code)->first();
        return $order;
    }
}
