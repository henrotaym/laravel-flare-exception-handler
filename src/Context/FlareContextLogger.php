<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Context;

use Spatie\LaravelIgnition\Facades\Flare;
use Throwable;

class FlareContextLogger
{
    public function __construct(
        protected Throwable $exception
    ){}

    public function report(): void
    {
        $isContextUnavailable = !method_exists($this->exception, "context");

        if ($isContextUnavailable) return;

        foreach($this->exception->context() as $key => $value):
            Flare::context($key, $value);
        endforeach;
    }
}