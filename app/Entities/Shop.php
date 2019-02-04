<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Shop.
 *
 * @package namespace App\Entities;
 */
class Shop extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];


    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function user_create()
    {
        return $this->belongsTo('App\User', 'create_user_id');
    }
}