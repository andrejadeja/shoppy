<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function shop()
    {
        return $this->hasOne('App\Shop', 'owner_id');
    }


    /*public function isAdmin()
    {    
        if($this->role->role == 'Administrator')

        return true;

    }

    public function isWorker()
    {
        if($this->role->role == 'Worker')

        return true;
    }*/


}
