<?php

namespace Henrotaym\LaravelFlareExceptionHandler;

use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContext;
use Henrotaym\LaravelFlareExceptionHandler\Traits\IsFlareLogger;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/**
 * Handler logging exception with their context to flare.
 * 
 */
class FlareExceptionHandler extends ExceptionHandler
{
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(FlareContext::report());
    }
}
