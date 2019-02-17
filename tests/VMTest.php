<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use SP\VM;
use SP\ServerDetails;
use SP\FittingServer;

/**
 * Class VMTest
 *
 * @author Ilyas DEMIRTAS <ilyasdemirtas@hotmail.com.tr>
 */
class VMTest extends TestCase
{
    public function testConstruct()
    {
        $vm = new VM(2, 16, 100);

        $this->assertSame(2, $vm->getCPU());
        $this->assertSame(16, $vm->getRAM());
        $this->assertSame(100, $vm->getHDD());
    }
}
