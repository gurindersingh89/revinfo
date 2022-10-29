<?php

namespace App\Providers;

use App\Models\Teacher;
use App\Observers\TeacherObserver;
use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
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
        Teacher::observe(TeacherObserver::class);
    }
}
