<?php

namespace App\Policies;

use App\User;
use App\Shop;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the shop.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */

    public function before(User $user)
    {
        return $user->isAn('admin');
    
    }


    public function index(User $user)
    {
        
    }
        

    /**
     * Determine whether the user can create shops.
     *
     * @param  \App\User  $user
     * @return mixed
     */


    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the shop.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
    public function update(User $user, Shop $shop)
    {
        //
    }

    /**
     * Determine whether the user can delete the shop.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
    public function delete(User $user, Shop $shop)
    {
        //
    }

    /**
     * Determine whether the user can restore the shop.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
    public function restore(User $user, Shop $shop)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the shop.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
    public function forceDelete(User $user, Shop $shop)
    {
        //
    }
}
