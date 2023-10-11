<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests\Unit;

use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContextLogger;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContextLoggerFactory;
use Henrotaym\LaravelFlareExceptionHandler\Tests\Exceptions\ContextException;
use Henrotaym\LaravelFlareExceptionHandler\Tests\TestCase;

class FlareContextLoggerFactoryTest extends TestCase
{
    /** @test */
    public function reporting_context_to_flare()
    {
        $exception = new ContextException();
        /** @var FlareContextLoggerFactory */
        $loggerFactory = app()->make(FlareContextLoggerFactory::class);

        $logger = $loggerFactory->create($exception);

        $this->assertInstanceOf(FlareContextLogger::class, $logger);
    }
}