<?php namespace Quasar\Admin;

use Illuminate\Support\ServiceProvider;

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
            __DIR__ . '/../../database/seeds/' => base_path('/database/seeds')
        ], 'seeds');

        // register config
        $this->publishes([
            __DIR__ . '/../../config/quasar-admin.php'                  => config_path('quasar-admin.php'),
            __DIR__ . '/../../../../core/src/config/lighthouse.php'     => config_path('lighthouse.php'),
            __DIR__ . '/../../../../core/src/config/quasar-core.php'    => config_path('quasar-core.php'),
            __DIR__ . '/../../../../oauth/src/config/quasar-oauth.php'  => config_path('quasar-oauth.php')
        ], 'config');
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
