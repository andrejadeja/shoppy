<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\ObservantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Shop.
 *
 * @package namespace App\Entities;
 */
class Shop extends Model implements Transformable
{
    use TransformableTrait;
    use ObservantTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function user_create()
    {
        return $this->belongsTo('App\User', 'create_user_id');
    }


    protected $dates = ['deleted_at'];
}
