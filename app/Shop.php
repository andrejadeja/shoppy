<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];



    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function user_create()
    {
        return $this->belongsTo('App\User', 'create_user_id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'update_user_id');
    }

    public function user_delete()
    {
        return $this->belongsTo('App\User', 'delete_user_id');
    }
}
