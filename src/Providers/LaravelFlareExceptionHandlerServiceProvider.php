<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelFlareExceptionHandlerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        config(['logging.channels.flare' => ['driver' => 'flare']]);
    }
}