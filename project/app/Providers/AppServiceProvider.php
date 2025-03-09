<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Room;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $room_all = Room::get();
        view()->share('global_room_data',$room_all);
    }
}
