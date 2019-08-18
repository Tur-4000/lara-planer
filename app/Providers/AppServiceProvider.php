<?php

namespace App\Providers;

use App\Models\Category;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Jenssegers\Date\Date;

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
        setlocale(LC_ALL, 'ru_RU.utf8');
        Carbon::setLocale(config('app.locale'));
        Date::setlocale(config('app.locale'));
        Category::observe(CategoryObserver::class);
    }
}
