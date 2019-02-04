<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function change(User $user, Category $category)
    {
        if($user->isAn('admin'))
            return true;


        elseif($user->shop && $user->shop->id == $category->shop_id);
            return true;
    }

   
}
