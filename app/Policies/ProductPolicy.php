<?php

namespace App\Policies;

use App\User;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function change(User $user, Product $product)
    {
    
        if($user->isAdmin())
            return true;
        

        elseif($user->shop && $user->shop->id == $product->shop_id);
             return true;
    }
}
