<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id');
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
