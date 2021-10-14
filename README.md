# Flare exception handler

## Installation

    composer require henrotaym/laravel-flare-exception-handler

## Configuration

Your handler should extends :

    Henrotaym\LaravelFlareExceptionHandler\FlareExceptionHandler

If you need more control, override `register` method from handler and call this method where needed :

    /**
    * Reporting exception context to flare.
    * 
    * @param Throwable $e
    * @return void
    */
    protected function reportContextToFlare(Throwable $e)


