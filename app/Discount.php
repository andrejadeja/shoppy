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
}
