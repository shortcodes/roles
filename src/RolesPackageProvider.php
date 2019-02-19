<?php

namespace Shortcodes\Authentication;

use Illuminate\Support\ServiceProvider;
use Shortcodes\Roles\Commands\AddRole;
use Shortcodes\Roles\Commands\DeleteRole;
use Shortcodes\Roles\Commands\IndexRoles;

class RolesPackageProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                AddRole::class,
                DeleteRole::class,
                IndexRoles::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/config/access.php' => config_path('access.php'),
        ]);
    }
}
