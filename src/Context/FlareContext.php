<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Context;

use Throwable;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContextLoggerFactory;

class FlareContext
{
    /**
     * @return callable(Throwable $e): void
     */
    public static function report(): callable
    {
        /** @var FlareContextLoggerFactory */
        $loggerFactory = app()->make(FlareContextLoggerFactory::class);

        return fn (Throwable $exception)
            => $loggerFactory->create($exception)->report();
    }
}