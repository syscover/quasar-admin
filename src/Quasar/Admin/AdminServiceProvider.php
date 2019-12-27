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
            __DIR__ . '/../../config/quasar-admin.php' => config_path('quasar-admin.php')
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
