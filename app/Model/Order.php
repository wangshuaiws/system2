<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_name', 'order_name', 'status','date'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
