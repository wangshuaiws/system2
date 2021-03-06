<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model
{
    protected $fillable = [
        'name','role_name','user_id','title','number','total','from_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
