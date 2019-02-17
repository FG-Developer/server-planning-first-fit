<?php

namespace SP;

/**
 * Class Server
 *
 * @author Ilyas Demirtas <ilyasdemirtas@hotmail.com.tr>
 */
class Server
{
    /**
     * @var int
     */
    private $cpu;

    /**
     * @var int
     */
    private $ram;

    /**
     * @var int
     */
    private $hdd;

    /**
     * @var array
     */
    private $vms = [];

    /**
     * Server constructor.
     * @param ServerDetails $serverDetails
     */
    public function __construct(ServerDetails $serverDetails)
    {
        $this->cpu = $serverDetails->getCPU();
        $this->ram = $serverDetails->getRAM();
        $this->hdd = $serverDetails->getHDD();
    }

    /**
     * @return int
     */
    public function getCPU(): int
    {
        return $this->cpu;
    }

    /**
     * @return int
     */
    public function getRAM(): int
    {
        return $this->ram;
    }

    /**
     * @return int
     */
    public function getHDD(): int
    {
        return $this->hdd;
    }

    /**
     * @return int
     */
    public function getCPUVolume(): int
    {
        $cpuVolume = 0;
        foreach ($this->vms as $vm) {
            $cpuVolume += $vm->getCPU();
        }
        return $cpuVolume;
    }

    /**
     * @return int
     */
    public function getRAMVolume(): int
    {
        $ramVolume = 0;
        foreach ($this->vms as $vm) {
            $ramVolume += $vm->getRAM();
        }
        return $ramVolume;
    }

    /**
     * @return int
     */
    public function getHDDVolume(): int
    {
        $hddVolume = 0;
        foreach ($this->vms as $vm) {
            $hddVolume += $vm->getHDD();
        }
        return $hddVolume;
    }

    /**
     * @return array
     */
    public function getVMS(): array
    {
        return $this->vms;
    }

    /**
     * @param VM $item
     * @return $this
     */
    public function addItem(VM $vm)
    {
        $this->vms[] = $vm;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return count($this->vms) === 0;
    }
}
