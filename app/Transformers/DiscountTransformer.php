<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Discount;

/**
 * Class DiscountTransformer.
 *
 * @package namespace App\Transformers;
 */
class DiscountTransformer extends TransformerAbstract
{
    /**
     * Transform the Discount entity.
     *
     * @param \App\Entities\Discount $model
     *
     * @return array
     */
    public function transform(Discount $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
