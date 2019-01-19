<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public function sale()
    {
        return $this->belongsTo('App\Sale', 'sale_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
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
