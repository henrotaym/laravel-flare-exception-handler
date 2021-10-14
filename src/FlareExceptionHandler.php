<?php

namespace Henrotaym\LaravelFlareExceptionHandler;

use Throwable;
use Facade\Ignition\Facades\Flare;
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
        $this->reportable(function (Throwable $e) {
            $this->reportContextToFlare($e);
        });
    }

    /**
     * Reporting exception context to flare.
     * 
     * @param Throwable $e
     * @return void
     */
    protected function reportContextToFlare(Throwable $e)
    {
        if(method_exists($e, 'context')):
            foreach ($e->context() as $key => $value):
                Flare::context($key, $value);
            endforeach;
        endif;
    }
}
