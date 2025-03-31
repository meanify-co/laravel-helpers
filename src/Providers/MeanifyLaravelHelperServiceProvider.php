<?php

namespace Meanify\LaravelHelpers\Providers;

use Illuminate\Support\ServiceProvider;

class MeanifyLaravelHelperServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        if (!function_exists('meanify_helpers')) {
            require_once __DIR__ . '/../../boot.php';
        }
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton('meanify_helpers', function($app, $params) {
            return new \Meanify\LaravelHelpers\Kernel();
        });
    }
}
