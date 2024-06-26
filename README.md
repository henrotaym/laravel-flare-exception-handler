# Flare exception handler

## Compatibility

| Version de laravel | Version du package |
|--|--|
| 7.x.x | 1.x.x |
| 8.x.x | 2.x.x |
| 9.x.x | 2.x.x |
| 10.x.x | 3.x.x |

## Installation

    composer require henrotaym/laravel-flare-exception-handler

## Configuration

### Environment

```shell
LOG_CHANNEL=flare
```

## Usage
### Optimal
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
### Deprecated
Your application `Handler.php` should look like this

```php
namespace App\Exceptions;

use Henrotaym\LaravelFlareExceptionHandler\FlareExceptionHandler;

class Handler extends FlareExceptionHandler
{
    
}
```
If you need more control, override `register` method from handler and call this method where needed :
```php
    /**
    * Reporting exception context to flare.
    * 
    * @param Throwable $e
    * @return void
    */
    protected function reportContextToFlare(Throwable $e);
```
