<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Context;

use Throwable;
use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContextLogger;

class FlareContextLoggerFactory
{
    public function create(Throwable $exception): FlareContextLogger
    {
        return app()->make(FlareContextLogger::class, ["exception" => $exception]);
    }
}