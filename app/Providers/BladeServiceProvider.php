<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('memberCanAccess', function ($expression) {
            // eval("\$args = [{$expression}];");
            // list($permissionId, $projectId) = array_map('trim', $args);
            $params = explode(',', $expression);
            dd($params);

            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})): ?>";
        });
    }
}
