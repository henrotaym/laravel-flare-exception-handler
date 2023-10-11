# Flare exception handler for laravel 10

## Installation

    composer require henrotaym/laravel-flare-exception-handler

## Configuration

### Environment

```shell
LOG_CHANNEL=flare
```

## Usage
```php
namespace App\Exceptions;

use Henrotaym\LaravelFlareExceptionHandler\Context\FlareContext;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    public function register()
    {
        // Add this line to report context to flare
        $this->reportable(FlareContext::report());
    }
}
```
