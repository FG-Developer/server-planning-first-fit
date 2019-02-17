<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use SP\VM;
use SP\ServerDetails;
use SP\FittingServer;

/**
 * Class ServerTest
 *
 * @author Ilyas DEMIRTAS <ilyasdemirtas@hotmail.com.tr>
 */
class ServerTest extends TestCase
{
    /**
     * @var Server
     */
    private $server;

    protected function setUp()
    {
        parent::setUp();

        $this->server = new Server(new ServerDetails(12, 64, 500));
    }

    public function testConstruct()
    {
        $this->assertSame(12, $this->server->getCPU());
        $this->assertSame(64, $this->server->getRAM());
        $this->assertSame(500, $this->server->getHDD());
    }

    public function testAddVM()
    {
        $vm1 = new VM(6, 32, 250);
        $vm2 = new VM(6, 32, 250);

        $this->server
            ->addItem($vm1)
            ->addItem($vm2);

        $this->assertEquals([$vm1, $vm2], $this->server->getVMS());
    }

    public function testGetCPUVolume()
    {
        $vm1 = new VM(6, 32, 250);
        $vm2 = new VM(6, 32, 250);

        $this->server
            ->addItem($vm1)
            ->addItem($vm2);

        $this->assertSame(12, $this->server->getCPUVolume());
    }

    public function testGetRAMVolume()
    {
        $vm1 = new VM(6, 32, 250);
        $vm2 = new VM(6, 32, 250);

        $this->server
            ->addItem($vm1)
            ->addItem($vm2);

        $this->assertSame(64, $this->server->getRAMVolume());
    }

    public function testGetHDDVolume()
    {
        $vm1 = new VM(6, 32, 250);
        $vm2 = new VM(6, 32, 250);

        $this->server
            ->addItem($vm1)
            ->addItem($vm2);

        $this->assertSame(500, $this->server->getHDDVolume());
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->server->isEmpty());

        $this->server->addItem(new VM(6, 16, 250));

        $this->assertFalse($this->server->isEmpty());

    }
}
