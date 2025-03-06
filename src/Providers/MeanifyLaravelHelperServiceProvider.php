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
        if (!function_exists('meanifyUtils')) {
            require_once __DIR__ . '/../../boot.php';
        }
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton('meanifyPaymentHub', function($app, $params) {
            return new \Meanify\LaravelPaymentHub\Factory($params['gatewayActiveKey'], $params['gatewayVersion'], $params['gatewayEnvironment'], $params['gatewayParams']);
        });
    }
}
