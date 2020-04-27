<?php namespace Quasar\Admin\Events;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Quasar\Admin\Events\LangCreated;
use Quasar\Admin\Listeners\LangCreatedListener;

class AdminEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        LangCreated::class => [
            LangCreatedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
