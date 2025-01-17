<?php

namespace ashfieldjumper\PHPWakeOnLan\Tests;

use PHPUnit\Framework\TestCase;
use ashfieldjumper\PHPWakeOnLan\MagicPacket;

/**
 * Class MagicPacketTest.
 *
 * @covers  \ashfieldjumper\PHPWakeOnLan\MagicPacket
 */
class MagicPacketTest extends TestCase
{
    /**
     * @covers \ashfieldjumper\PHPWakeOnLan\MagicPacket::isMacAddressValid()
     */
    public function testIsMacAddressValid(): void
    {
        $this->assertTrue(MagicPacket::isMacAddressValid('00:1B:21:1C:7F:23'));
        $this->assertFalse(MagicPacket::isMacAddressValid(' 00:1P:21:1X:7F:23'));
        $this->assertFalse(MagicPacket::isMacAddressValid(' 00:00:1P:21:1X:7F:23'));
    }

    /**
     * @covers \ashfieldjumper\PHPWakeOnLan\MagicPacket::trimMacAddress()
     */
    public function testTrimMacAddress(): void
    {
        $this->assertEquals('001B211C7F23', MagicPacket::trimMacAddress(' 00:1B:21:1C:7F:23'));
    }

    /**
     * @covers \ashfieldjumper\PHPWakeOnLan\MagicPacket::packMacAddress()
     */
    public function testPackMacAddress(): void
    {
        $mac1 = '00:1B:21:1C:8F:23  ';
        $mac2 = '00:1C:21:1C:8F:27  ';
        $sample = pack('H12', '001B211C8F23');

        $this->assertEquals($sample, MagicPacket::packMacAddress($mac1));
        $this->assertNotEquals($sample, MagicPacket::packMacAddress($mac2));
    }

    /**
     * @covers \ashfieldjumper\PHPWakeOnLan\MagicPacket::buildMagicPacketString()
     * @throws \Exception
     */
    public function testBuildMagicPacketString(): void
    {
        $mac1 = '00:1B:21:1C:8F:23';
        $mac2 = '00:1C:21:1C:8F:27';
        $sample = str_repeat(chr(0xff), 6)
                  .str_repeat(pack('H12', '001B211C8F23'), 16);

        $magicPacket1 = new MagicPacket($mac1);
        $magicPacket2 = new MagicPacket($mac2);

        $this->assertEquals($sample, $magicPacket1);
        $this->assertNotEquals($sample, $magicPacket2);
    }
}
