<?php
namespace BenWecom4U\Editor;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        $this->handleConfigs();
        $this->handleMigrations();
        // $this->handleViews();
        // $this->handleTranslations();
        $this->handleRoutes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/laravel-edit-mode.php';

        $this->publishes([$configPath => config_path('laravel-edit-mode.php')]);

        $this->mergeConfigFrom($configPath, 'laravel-edit-mode');
    }

    private function handleTranslations() {

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laravel-edit-mode');
    }

    private function handleViews() {

        $this->loadViewsFrom(__DIR__.'/../views', 'laravel-edit-mode');

        $this->publishes([__DIR__.'/../views' => base_path('resources/views/vendor/laravel-edit-mode')]);
    }

    private function handleMigrations() {

        $this->publishes([__DIR__ . '/../migrations' => base_path('database/migrations')]);
    }

    private function handleRoutes() {

        include __DIR__.'/../routes.php';
    }
}
