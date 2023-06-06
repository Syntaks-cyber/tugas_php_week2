<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

class AppServiceProvider extends ServiceProvider
{
    /**
<<<<<<< HEAD
=======
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
<<<<<<< HEAD

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
