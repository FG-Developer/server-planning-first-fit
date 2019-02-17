<?php

namespace SP;

/**
 * Class FittinServer
 *
 * @author Ilyas Demirtas <ilyasdemirtas@hotmail.com.tr>
 */
class FittingServer
{
    /**
     * Get created Server Count
     *
     * @param ServerDetails $serverDetails
     * @param array $vms
     *
     * @return int
     */
    public function calculate(ServerDetails $serverDetails, array $vms): int
    {
        $fitServer = $this->fitServer($serverDetails, $vms);
        return count($fitServer);
    }

    /**
     * According to the VMs created, the server that is needed is created.
     * IF Server volume is full, createing new server.
     *
     * @param ServerDetails $serverDetails
     * @param array         $vms
     *
     * @return array|bool
     */
    public function fitServer(ServerDetails $serverDetails, array $vms): array {
        $servers = [];

        $this->sortByVolumeDesc($vms);

        foreach ($vms as $vm){

            if (count($servers) === 0) {
                $servers[] = new Server($serverDetails);
            }

            foreach ($servers as $server) {
                if ($this->checkServerVolumes($vm, $server)) {
                    $server->addItem($vm);
                    continue 2;
                } else if ($server->isEmpty()) {
                    return false;
                }
            }

            $newServer = new Server($serverDetails);

            if ($this->checkServerVolumes($vm, $newServer)) {
                $newServer->addItem($vm);
                $servers[] = $newServer;
            } else {
                return false;
            }

        }

        return $servers;
    }

    /**
     * Checks generated servers volumes
     *
     * @param  VM     $vm
     * @param  Server $server
     *
     * @return bool
     */
    public function checkServerVolumes(VM $vm, Server $server)
    {
        $this->checkVMSize($vm, $server);

        if($server->getCPUVolume() + $vm->getCPU() > $server->getCPU()){
            return false;
        }

        if($server->getRAMVolume() + $vm->getRAM() > $server->getRAM()){
            return false;
        }

        if($server->getHDDVolume() + $vm->getHDD() > $server->getHDD()){
            return false;
        }

        return true;
    }

    /**
     * Check Generated VM hardware size.
     * if generate vm has any hardware size greater than main server hardware size,
     * throws an exception.
     *
     * @param  VM     $vm
     * @param  Server $server
     *
     * @return Exception|bool
     */
    private function checkVMSize(VM $vm, Server $server){

        if($vm->getCPU() > $server->getCPU()){
            throw new \Exception("The CPU of VM is big from Server's CPU.");
        }

        if($vm->getRAM() > $server->getRAM()){
            throw new \Exception("The RAM of VM is big from Server's RAM.");
        }

        if($vm->getHDD() > $server->getHDD()){
            throw new \Exception("The HDD of VM is big from Server's HDD.");
        }

        return true;
    }

    /**
     * @param array $vms
     */
    private function sortByVolumeDesc(array &$vms)
    {
        usort($vms, function(VM $vm1, VM $vm2) {
            return $vm1->getVolume() - $vm2->getVolume();
        });
    }
}
