<?php namespace Quasar\Admin;

use Illuminate\Support\ServiceProvider;
use Quasar\Admin\Events\AdminEventServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        // register routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        
        // register migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // register translations
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'admin');

        // register seeds
        $this->publishes([
            __DIR__ . '/../../database/seeds/'                      => base_path('/database/seeds'),
            __DIR__ . '/../../../../oauth/src/database/seeds/'      => base_path('/database/seeds')
        ], 'seeds');

        // register config
        $this->publishes([
            __DIR__ . '/../../config/quasar-admin.php'                  => config_path('quasar-admin.php'),
            __DIR__ . '/../../../../oauth/src/config/quasar-oauth.php'  => config_path('quasar-oauth.php')
        ], 'config');

        // register events and listener predefined
        $this->app->register(AdminEventServiceProvider::class);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        //
	}
}
