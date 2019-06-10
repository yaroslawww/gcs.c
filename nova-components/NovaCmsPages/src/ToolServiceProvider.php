<?php

namespace Yaroslawww\NovaCmsPages;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yaroslawww\NovaCmsPages\Http\Middleware\Authorize;
use Yaroslawww\NovaCmsPages\Nova\Resources\Page;
use Yaroslawww\NovaCmsPages\Nova\Resources\TemplateFieldGroup;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/cms-pages.php' => config_path('cms-pages.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-cms-pages');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            $this->resources();

            Nova::script('nova-template-field', __DIR__.'/../dist/js/template-field.js');
            Nova::style('nova-template-field', __DIR__.'/../dist/css/template-field.css');
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/nova-cms-pages')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/cms-pages.php', 'cms-pages'
        );
    }

    protected function resources()
    {
        Nova::resources([
            Page::class,
            TemplateFieldGroup::class,
        ]);
    }
}
