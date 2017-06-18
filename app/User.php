<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','sex','birthday','confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_admin()
    {
        return $this->email == $this->admin?true:false;
    }

    public function role()
    {
        return $this->belongsToMany('App\Model\Role');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function permission()
    {
        return $this->hasMany('App\Model\Permission');
    }

    public function scale()
    {
        return $this->hasMany('App\Model\Scale');
    }

    public function application()
    {
        return $this->hasOne('App\Model\Application');
    }

    public function information()
    {
        return $this->hasOne('App\Model\Information');
    }
}
