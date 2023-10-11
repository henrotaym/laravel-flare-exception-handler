<?php
namespace Henrotaym\LaravelFlareExceptionHandler\Tests\Unit;

use Henrotaym\LaravelFlareExceptionHandler\Tests\TestCase;

class ConfigTest extends TestCase
{
    /** @test */
    public function registering_flare_logging_channel()
    {
        $expectedChannel = [
            "driver" => "flare"
        ];
        $channel = config("logging.channels.flare");

        $this->assertEquals($expectedChannel, $channel);
    }
}