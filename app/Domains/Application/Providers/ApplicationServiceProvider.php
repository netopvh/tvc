<?php
namespace App\Domains\Application\Providers;

use App\Domains\Application\Repositories\BannerRepositoryEloquent;
use App\Domains\Application\Repositories\Contracts\BannerRepository;
use App\Domains\Application\Repositories\Contracts\NoticiaCategoriaRepository;
use App\Domains\Application\Repositories\Contracts\NoticiaRepository;
use App\Domains\Application\Repositories\Contracts\ParceiroRepository;
use App\Domains\Application\Repositories\NoticiaCategoriaRepositoryEloquent;
use App\Domains\Application\Repositories\NoticiaRepositoryEloquent;
use App\Domains\Application\Repositories\ParceiroRepositoryEloquent;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Domains\Application\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Register all repositories for this module
     *
     */
    public function register()
    {
        $this->app->bind(NoticiaRepository::class,NoticiaRepositoryEloquent::class);
        $this->app->bind(ParceiroRepository::class,ParceiroRepositoryEloquent::class);
        $this->app->bind(BannerRepository::class,BannerRepositoryEloquent::class);
        $this->app->bind(NoticiaCategoriaRepository::class,NoticiaCategoriaRepositoryEloquent::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(app_path('Domains/Application/Routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(app_path('Domains/Access/Routes/api.php'));
    }
}
