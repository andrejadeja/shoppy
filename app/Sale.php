<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id');
    }
}
