<?php

namespace SP;

/**
 * Class VM
 *
 * @author Ilyas Demirtas <ilyasdemirtas@hotmail.com.tr>
 */
class VM
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
     * Server constructor.
     * @param $cpu
     * @param $ram
     * @param $hdd
     */
    public function __construct(int $cpu, int $ram, int $hdd)
    {
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->hdd = $hdd;
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
     * All hardware volume. This method use only for sorting.
     * @return int
     */
    public function getVolume(){
        return $this->cpu + $this->ram + $this->hdd;
    }
}
