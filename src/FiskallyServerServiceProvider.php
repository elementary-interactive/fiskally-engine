<?php
/**
 * 
 */

namespace ElementaryInteractive\FiskallyServer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class MangoServiceProvider extends ServiceProvider
{
    /** Bootstrap any application services.
     * 
     * @param \Illuminate\Contracts\Http\Kernel  $kernel
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {
        /** Register artisan commands.
         */
        if ($this->app->runningInConsole()) {
            // $this->commands([
            //     FooCommand::class,
            //     BarCommand::class,
            // ]);
        }

        $this->registerPublishing();

        $this->registerResources();

        //Blade::component('app.components.component', 'component');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->commands([]);
    }

    public function registerPublishing()
    {
        // $this->publishes([
        //     __DIR__.'/../config/mango.php' => config_path('mango.php'),
        // ], 'config');        
    }

    public function registerResources()
    {
        /* Publishing database migrations.
         */
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        /** Loading webpage routings
         */
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        /** Publishing views
         */
        //$this->loadViewsFrom(__DIR__.'/../resources/views', 'brightly-mango');
    }
}