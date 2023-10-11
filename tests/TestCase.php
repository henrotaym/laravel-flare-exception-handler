<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Henrotaym\LaravelFlareExceptionHandler\Providers\LaravelFlareExceptionHandlerServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [LaravelFlareExceptionHandlerServiceProvider::class];
    }
}