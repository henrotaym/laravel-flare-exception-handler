<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Context;

use Throwable;

class FlareExceptionContextFactory
{
    public function create(Throwable $exception): array
    {
        return [
            "message" => $exception->getMessage(),
            "code" => $exception->getCode(),
            "file" => $exception->getFile(),
            "line" => $exception->getLine(),
            "trace" => $exception->getTrace()
        ];
    }
}