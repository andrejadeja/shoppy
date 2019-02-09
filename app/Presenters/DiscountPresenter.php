<?php

namespace App\Presenters;

use App\Transformers\DiscountTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DiscountPresenter.
 *
 * @package namespace App\Presenters;
 */
class DiscountPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DiscountTransformer();
    }
}
