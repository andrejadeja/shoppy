<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    public function category() {
    	return $this->belongsTo('App\Entities\Category', 'category_id');
    }

    public function user_create()
    {
        return $this->belongsTo('App\User', 'create_user_id');
    }

    
    public function valid_discount(){

    	return false;
    }
}
