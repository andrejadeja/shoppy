<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ShopRepository;
use App\Entities\Shop;
use App\Validators\ShopValidator;

/**
 * Class ShopRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ShopRepositoryEloquent extends BaseRepository implements ShopRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Shop::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ShopValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
