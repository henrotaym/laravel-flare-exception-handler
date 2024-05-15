<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests;

use Mockery\MockInterface;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Henrotaym\LaravelFlareExceptionHandler\Providers\LaravelFlareExceptionHandlerServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [LaravelFlareExceptionHandlerServiceProvider::class];
    }

    /**
     * @template TClass
     * 
     * @param class-string<TClass> $className
     * @return TClass|MockInterface
     */
    protected function mockThis(string $className): MockInterface
    {
        $mock = $this->mock($className);
        $this->app->bind($className, fn () => $mock);

        return $mock;
    }

    /**
     * @template TClass
     * 
     * @param class-string<TClass> $className
     * @return TClass
     */
    protected function makeThis(string $className, array $parameters = [])
    {
        return $this->app->make($className, $parameters);;
    }
}