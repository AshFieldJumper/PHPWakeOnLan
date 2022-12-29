<?php

namespace ashfieldjumper\PHPWakeOnLan\Tests\Socket;

use PHPUnit\Framework\TestCase;
use ashfieldjumper\PHPWakeOnLan\Socket\Socket;

/**
 * Class SocketTest.
 *
 * @covers \ashfieldjumper\PHPWakeOnLan\Socket\Socket
 */
class SocketTest extends TestCase
{
    /**
     * @covers \ashfieldjumper\PHPWakeOnLan\Socket\Socket::send()
     */
    public function testSend(): void
    {
        $socket = new Socket(SOL_UDP);
        socket_set_option($socket->getSocket(), SOL_SOCKET, SO_BROADCAST, true);
        $result = $socket->send('', '255.255.255.255', 7);
        $this->assertEquals(0, $result, 'Bytes sent must be 0');
    }
}
