<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Support\NumConverter;

class CollectionMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Collection::macro('mapValuesToChars', function () {
            return $this->map(function ($item, $key) {
                return collect($item)->map(function ($item) {
                    return NumConverter::convert($item);
                });
            });
        });
    }
}
