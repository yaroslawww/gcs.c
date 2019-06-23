<?php

namespace Yaroslawww\NovaCmsPages;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Yaroslawww\NovaCmsPages\Http\Middleware\Authorize;
use Yaroslawww\NovaCmsPages\Nova\Resources\Page;
use Yaroslawww\NovaCmsPages\Services\Page\NovaPages;
use Yaroslawww\NovaCmsPages\Services\Template\NovaTemplate;
use Yaroslawww\NovaCmsPages\Services\Template\TemplateExtracter;
use Yaroslawww\NovaCmsPages\Services\Template\TemplateLexer;

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
            __DIR__ . '/../config/cms-pages.php' => config_path('cms-pages.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-cms-pages');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            $this->resources();
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
        $this->app->bind('NovaCmsPages\TemplateInfoExtracter', function ($app) {
            return new TemplateExtracter(
                new TemplateLexer()
            );
        });

        $this->app->bind('NovaCmsPages\NovaTemplate', function ($app) {
            return new NovaTemplate(
                $this->app->make('NovaCmsPages\TemplateInfoExtracter'),
                resource_path('views' . DIRECTORY_SEPARATOR . config('cms-pages.page.templates_dir'))
            );
        });

        $this->app->bind('NovaCmsPages\NovaPages', function ($app) {
            return new NovaPages();
        });


        $this->mergeConfigFrom(
            __DIR__ . '/../config/cms-pages.php',
            'cms-pages'
        );
    }

    protected function resources()
    {
        Nova::resources([
            Page::class,
        ]);
    }
}
