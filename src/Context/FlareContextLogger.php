<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Context;

use Spatie\LaravelIgnition\Facades\Flare;
use Throwable;

class FlareContextLogger
{
    public function __construct(
        protected Throwable $exception,
        protected FlareExceptionContextFactory $contextFactory
    ){}

    public function report(): void
    {
        $previousException = $this->exception->getPrevious();
        $hasPreviousException = !is_null($previousException);

        if ($hasPreviousException):
            $previousExceptionContext = $this->contextFactory->create($previousException);
            Flare::context("previous_exception", $previousExceptionContext);
        endif;
            
        $isContextUnavailable = !method_exists($this->exception, "context");

        if ($isContextUnavailable) return;

        foreach($this->exception->context() as $key => $value):
            Flare::context($key, $value);
        endforeach;
    }
}