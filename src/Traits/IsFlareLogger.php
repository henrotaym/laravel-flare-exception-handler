<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Traits;

use Illuminate\Foundation\Exceptions\Handler;
use Spatie\LaravelIgnition\Facades\Flare;
use Throwable;

trait IsFlareLogger
{
    /**
     * Reporting exception context to flare if available.
     *
     * @return void
     */
    protected function reportToFlare(): void
    {
        /** @var Handler $this */
        $this->reportable(function (Throwable $exception) {
            $isContextAvailable = method_exists($exception, "context");

            if ($isContextAvailable) return;

            foreach ($exception->context() as $key => $value):
                Flare::context($key, $value);
            endforeach;
        });
    }
}