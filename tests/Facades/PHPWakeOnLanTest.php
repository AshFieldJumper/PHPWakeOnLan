<?php

namespace ashfieldjumper\PHPWakeOnLan\Tests\Facades;

use PHPUnit\Framework\TestCase;
use ashfieldjumper\PHPWakeOnLan\Facades\PHPWakeOnLan;

/**
 * Class PHPWakeOnLanTest.
 *
 * @covers \ashfieldjumper\PHPWakeOnLan\Facades\PHPWakeOnLan
 */
class PHPWakeOnLanTest extends TestCase
{
    /**
     * @covers \ashfieldjumper\PHPWakeOnLan\Facades\PHPWakeOnLan::getFacadeAccessor()
     */
    public function testGetFacadeAccessor(): void
    {
        PHPWakeOnLan::shouldReceive('getFacadeAccessor')->once()->andReturn('php-wake-on-lan');

        $this->assertEquals('php-wake-on-lan', PHPWakeOnLan::__callStatic('getFacadeAccessor', []));
    }
}
