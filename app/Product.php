<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}