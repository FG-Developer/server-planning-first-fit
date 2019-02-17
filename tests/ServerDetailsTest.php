<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use SP\VM;
use SP\ServerDetails;
use SP\FittingServer;

/**
 * Class FittingServerTest
 *
 * @author Ilyas DEMIRTAS <ilyasdemirtas@hotmail.com.tr>
 */
class ServerDetailsTest extends TestCase
{
    public function testConstruct()
    {
        $serverDetails = new ServerDetails(2, 16, 100);

        $this->assertSame(2, $serverDetails->getCPU());
        $this->assertSame(16, $serverDetails->getRAM());
        $this->assertSame(100, $serverDetails->getHDD());
    }
}
