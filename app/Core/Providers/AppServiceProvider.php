<?php

namespace App\Core\Providers;

use App\Core\Repositories\BaseRepository;
use App\Core\Repositories\BaseRepositoryContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryContract::class,BaseRepository::class);

    }
}
