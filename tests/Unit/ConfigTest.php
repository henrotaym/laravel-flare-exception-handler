<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests\Unit;

use Henrotaym\LaravelFlareExceptionHandler\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ConfigTest extends TestCase
{
    #[Test]
    public function registering_flare_logging_channel()
    {
        $expectedChannel = [
            "driver" => "flare"
        ];
        $channel = config("logging.channels.flare");

        $this->assertEquals($expectedChannel, $channel);
    }
}