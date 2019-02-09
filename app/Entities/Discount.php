<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\ObservantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discount.
 *
 * @package namespace App\Entities;
 */
class Discount extends Model implements Transformable
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

    public function product() {
        return $this->belongsTo('App\Entities\Product', 'product_id');
    }

    public function sale() {
        return $this->belongsTo('App\Entities\Sale', 'sale_id');
    }

    public function user_create()
    {
        return $this->belongsTo('App\User', 'create_user_id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'update_user_id');
    }


    protected $dates = ['deleted_at'];
}
