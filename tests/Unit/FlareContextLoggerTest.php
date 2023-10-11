<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests\Unit;

use Exception;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContextLogger;
use Henrotaym\LaravelFlareExceptionHandler\Tests\Exceptions\ContextException;
use Henrotaym\LaravelFlareExceptionHandler\Tests\TestCase;
use Spatie\LaravelIgnition\Facades\Flare;

class FlareContextLoggerTest extends TestCase
{
    /** @test */
    public function reporting_context_to_flare()
    {
        $exception = new ContextException();
        /** @var FlareContextLogger */
        $logger = app()->make(FlareContextLogger::class, ["exception" => $exception]);

        Flare::expects("context")->once()->with("name", "azerty")->andReturnSelf();
        Flare::expects("context")->once()->with("another", "azerty")->andReturnSelf();

        $logger->report();
    }

    /** @test */
    public function skipping_exception_without_context()
    {
        $exception = new Exception();
        /** @var FlareContextLogger */
        $logger = app()->make(FlareContextLogger::class, ["exception" => $exception]);

        Flare::expects("context")->never();

        $logger->report();
    }
}