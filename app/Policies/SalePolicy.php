<?php

namespace App\Policies;

use App\User;
use App\Sale;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sale.
     *
     * @param  \App\User  $user
     * @param  \App\Sale  $sale
     * @return mixed
     */
    public function change(User $user, Sale $sale)
    {
    
        if($user->isAdmin())
            return true;
        

        elseif($user->shop && $user->shop->id == $sale->shop_id);
             return true;
    }
}
