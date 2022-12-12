<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelFlareExceptionHandlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        config(['logging.flare' => ['driver' => 'flare']]);
    }
}