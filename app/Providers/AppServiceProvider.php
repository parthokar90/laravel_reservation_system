<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\AmenitiesRepository;
use App\Repository\CreateAmenities;
use App\Repository\BookingRepository;
use App\Repository\BookingUpdate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AmenitiesRepository::class, CreateAmenities::class);
        $this->app->bind(BookingRepository::class, BookingUpdate::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
