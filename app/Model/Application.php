<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'status','name','sex'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
