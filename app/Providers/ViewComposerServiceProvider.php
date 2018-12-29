<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\OccupationsComposer;
use App\Http\ViewComposers\UserComposer;
use App\Http\ViewComposers\LessonsComposer;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('auth.register', OccupationsComposer::class);
        view()->composer('account', UserComposer::class);

        view()->composer('lessons', UserComposer::class);
        view()->composer('lessons', LessonsComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
