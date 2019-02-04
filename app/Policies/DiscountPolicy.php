<?php

namespace App\Policies;

use App\User;
use App\Discount;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscountPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the discount.
     *
     * @param  \App\User  $user
     * @param  \App\Discount  $discount
     * @return mixed
     */
    public function change(User $user, Discount $discount)
    {
    
        if($user->isAn('admin'))
            return true;
        

        elseif($user->shop && $user->shop->id == $discount->shop_id);
             return true;
    }
}
