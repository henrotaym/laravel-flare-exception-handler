<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests\Exceptions;

use Exception;

class ContextException extends Exception
{
    public function context(): array
    {
        return [
            "name" => "azerty",
            "another" => "azerty"
        ];
    }
}