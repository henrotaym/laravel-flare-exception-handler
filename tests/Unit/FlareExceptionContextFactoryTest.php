<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests\Unit;

use Exception;
use Henrotaym\LaravelFlareExceptionHandler\Tests\TestCase;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareExceptionContextFactory;

class FlareExceptionContextFactoryTest extends TestCase
{
    /** @test */
    public function creating_exception_context()
    {
        $message = ":message";
        $code = 401;
        $exception = new Exception($message, $code);

        $contextFactory = $this->makeThis(FlareExceptionContextFactory::class);

        $context = $contextFactory->create($exception);

        $this->assertArrayHasKey("line", $context);
        $this->assertArrayHasKey("file", $context);
        $this->assertArrayHasKey("trace", $context);
        $this->assertEquals($message, $context["message"]);
        $this->assertEquals($code, $context["code"]);
    }
}