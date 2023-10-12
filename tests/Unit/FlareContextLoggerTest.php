<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests\Unit;

use Exception;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContextLogger;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareExceptionContextFactory;
use Henrotaym\LaravelFlareExceptionHandler\Tests\Exceptions\ContextException;
use Henrotaym\LaravelFlareExceptionHandler\Tests\TestCase;
use Spatie\LaravelIgnition\Facades\Flare;

class FlareContextLoggerTest extends TestCase
{
    /** @test */
    public function reporting_context_to_flare()
    {
        $exception = new ContextException();
        $contextFactory = $this->mockThis(FlareExceptionContextFactory::class);
        $logger = $this->makeThis(FlareContextLogger::class, ["exception" => $exception]);

        $contextFactory->expects("create")->never();
        Flare::expects("context")->once()->with("name", "azerty")->andReturnSelf();
        Flare::expects("context")->once()->with("another", "azerty")->andReturnSelf();

        $logger->report();
    }

    /** @test */
    public function skipping_exception_without_context()
    {
        $exception = new Exception();
        $logger = $this->makeThis(FlareContextLogger::class, ["exception" => $exception]);

        Flare::expects("context")->never();

        $logger->report();
    }

    /** @test */
    public function reporting_previous_exception()
    {
        $context = ["message" => ":message"];
        $previousException = new Exception();
        $exception = new Exception(":message", 500, $previousException);
        $contextFactory = $this->mockThis(FlareExceptionContextFactory::class);
        $logger = $this->makeThis(FlareContextLogger::class, ["exception" => $exception]);

        $contextFactory->expects("create")->once()->with($previousException)->andReturn($context);
        Flare::expects("context")->once()->with("previous_exception", $context)->andReturnSelf();

        $logger->report();
    }
}