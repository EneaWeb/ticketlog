<?php

namespace Ettore\Ticketlog;

use Illuminate\Support\ServiceProvider;

class ActivityticketlogServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        // Publish a config file
        $this->publishes([
            __DIR__.'/../../config/ticketlog.php' => config_path('ticketlog.php'),
        ], 'config');

// Publish your migrations
        $timestamp = date('Y_m_d_His', time());

        $this->publishes([
            __DIR__.'/../../migrations/create_ticket_log_table.stub' => database_path('/migrations/'.$timestamp.'_create_ticket_log_table.php'),
        ], 'migrations');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind(
            'activityticket',
            'Ettore\Ticketlog\ActivityticketlogSupervisor'
        );

        $this->app->bind(
            'Ettore\Ticketlog\Handlers\TicketlogHandlerInterface',
            'Ettore\Ticketlog\Handlers\EloquentHandler'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
