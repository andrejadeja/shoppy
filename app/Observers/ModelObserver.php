<?php

namespace App\Observers;

class ModelObserver
{
   

    public function updating($model)
    {
        $model->update_user_id = auth()->user()->id;
        
    }


    public function creating($model)
    {
        $model->create_user_id = auth()->user()->id;
        $model->shop_id = auth()->user()->shop->id;
    }

    public function deleting($model)
    {
        $model->delete_user_id = auth()->user()->id;
        
    }


  

}
