<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //

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

    public function user_create()
    {
        return $this->belongsTo('App\Users', 'delete_user_id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\Users', 'delete_user_id');
    }

    public function user_delete()
    {
        return $this->belongsTo('App\Users', 'delete_user_id');
    }
}
