<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;


    protected $dates = ['deleted_at'];



    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function discount()
    {
        return $this->hasOne('App\Discount', 'product_id');
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

    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id');
    }

    public function scopeOfRole($query){

        if(auth()->user()->isAdmin())
            return $query;

        else 
            return $query->whereHas('shop', function ($q){
                $q->where('owner_id', auth()->user()->id);
            });


    }


    public function valid_discount(){

        if($this->discount && strtotime($this->discount->sale->valid_until) >= strtotime(date('Y-m-d')))
        return $this->price;

        else 
        return NULL;
    }



}
