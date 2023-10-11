<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests\Unit;

use Exception;
use Mockery\MockInterface;
use Henrotaym\LaravelFlareExceptionHandler\Tests\TestCase;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContext;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContextLogger;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContextLoggerFactory;

class FlareContextTest extends TestCase
{
    /** @test */
    public function constructing_a_reportable_callback()
    {
        $exception = new Exception();
        $logger = $this->mockThis(FlareContextLogger::class);
        $factory = $this->mockThis(FlareContextLoggerFactory::class);
        $callback = FlareContext::report();

        $factory->expects("create")->once()->with($exception)->andReturn($logger);
        $logger->expects("report")->once()->with()->andReturnUndefined();
        

        $this->assertTrue(is_callable($callback));

        $result = $callback($exception);

        $this->assertNull($result);
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
}