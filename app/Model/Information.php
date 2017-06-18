<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'name', 'ways', 'places','type'
    ];
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
