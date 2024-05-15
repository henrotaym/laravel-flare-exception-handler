<?php

namespace Henrotaym\LaravelFlareExceptionHandler;

use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContext;
use Throwable;
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

    /**
     * Reporting exception context to flare.
     * 
     * @deprecated You should now use FlareContext::report().
     * 
     * @param Throwable $e
     * @return void
     */
    protected function reportContextToFlare(Throwable $e)
    {
        $report = FlareContext::report();
        $report($e);
    }
}