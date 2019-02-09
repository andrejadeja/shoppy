<?php

namespace App;

use App\Observers\ModelObserver;

trait ObservantTrait
{
    public static function bootObservantTrait()
    {
        static::observe(new ModelObserver);
    }
}