<?php

namespace ashfieldjumper\PHPWakeOnLan\Tests;

use PHPUnit\Framework\TestCase;
use ashfieldjumper\PHPWakeOnLan\PHPWakeOnLan;

/**
 * Class PHPWakeOnLanTest.
 *
 * @covers \ashfieldjumper\PHPWakeOnLan\PHPWakeOnLan
 */
class PHPWakeOnLanTest extends TestCase
{
    /**
     * @covers \ashfieldjumper\PHPWakeOnLan\PHPWakeOnLan::isBroadcastAddressValid()
     */
    public function testIsBroadcastAddressValid(): void
    {
        $this->assertTrue(PHPWakeOnLan::isBroadcastAddressValid('192.168.1.255'));
        $this->assertFalse(PHPWakeOnLan::isBroadcastAddressValid('192.168.1.33'));
    }

    /**
     * @covers \ashfieldjumper\PHPWakeOnLan\PHPWakeOnLan::wake()
     * @throws \Exception
     */
    public function testWake(): void
    {
        $wol = new PHPWakeOnLan();
        $result = $wol->wake(['00:1B:2C:1C:DF:22']);

        //$this->assertTrue(is_array($result));
        $this->assertNotEmpty($result);
    }
}
