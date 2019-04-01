<?php

namespace ubitcorp\Settings;
 
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    { 
        $this->registerConfig();  
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');   
    }
 
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('settings.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/Config/config.php', 'settings'
        );
    }
  

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['settings'];
    }
}
