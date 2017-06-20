<?php 

namespace App\Model;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}