<?php

namespace Henrotaym\LaravelFlareExceptionHandler;

use Henrotaym\LaravelFlareExceptionHandler\Traits\IsFlareLogger;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/**
 * Handler logging exception with their context to flare.
 * 
 */
class Handler extends ExceptionHandler
{
    use IsFlareLogger;

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportToFlare();
    }
}
