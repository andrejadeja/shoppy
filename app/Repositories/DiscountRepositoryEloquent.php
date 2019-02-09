<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DiscountRepository;
use App\Entities\Discount;
use App\Validators\DiscountValidator;

/**
 * Class DiscountRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DiscountRepositoryEloquent extends BaseRepository implements DiscountRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Discount::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DiscountValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
