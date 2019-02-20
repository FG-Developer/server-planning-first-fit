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
class FittingServerTest extends TestCase
{
    public function testServerNoVM()
    {
        $serverDetails = $this->getMockBuilder(ServerDetails::class)
                                ->disableOriginalConstructor()
                                ->getMock();

        $calculate = new FittingServer();
        $this->assertSame(0, $calculate->calculate($serverDetails, []));
    }

    public function testBigVM()
    {
        $this->expectException(\Exception::class);

        $serverDetails = new ServerDetails(12, 64, 500);

        $vm1 = new VM(6, 32, 250);
        $vm2 = new VM(6, 32, 555);

        $calculate = new FittingServer();
        $calculate->calculate($serverDetails, [$vm1, $vm2]);
    }
    
    public function testCalculateInt()
    {
        $serverDetails = new ServerDetails(12, 64, 500);
    
        $vm1 = new VM(6, 32, 250);
        $vm2 = new VM(6, 32, 250);
    
        $calculate = new FittingServer();
        $server_count = $calculate->calculate($serverDetails, [$vm1, $vm2]);
        
        $this->assertIsInt($server_count);
    }

}
