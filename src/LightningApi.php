<?php

namespace Lightning;

class LightningApi 
{
    private $rpcFile;

    /**
     * Set the lightning RPC file, typically /home/<user>/.lightning/lightning-rpc
     * 
     * @param string $rpcFile Full path to lightning-rpc file.
     */
    public function setRpcFile($rpcFile) 
    {
        $this->rpcFile = 'unix://' . $rpcFile;
    }

    private function sendCommand(array $input) 
    {
        if (is_null($this->rpcFile)) {
            throw new \Exception('rpcFile not set');
        }
        
        $factory = new \Socket\Raw\Factory();
        $socket = $factory->createClient($this->rpcFile);
        $socket->setBlocking(true);
        $socket->write(json_encode($input));
        $data = "";
        do {
            $data .= $socket->read(8096);
        } while ($socket->assertAlive() && $socket->selectRead(1.0));
        $socket->close();
        return json_decode($data);
    }

    public function getinfo() 
    {
        $input = [
            "method" => "getinfo",
            "params" => [],
            "id" => 0
        ];
        return $this->sendCommand($input);
    }

    public function invoice($msatoshi, $label, $description) 
    {
        $input = [
            "method" => "invoice",
            "params" => [
                "msatoshi" => $msatoshi,
                "label" => $label,
                "description" => $description,
            ],
            "id" => 0
        ];
        return $this->sendCommand($input);
    }

    public function listinvoices($label) 
    {
        $input = [
            "method" => "listinvoices",
            "params" => [
                "label" => $label,
            ],
            "id" => 0
        ];
        return $this->sendCommand($input);
    }

    public function decodepay($bolt11) 
    {
        $input = [
            "method" => "decodepay",
            "params" => [
                "bolt11" => $bolt11,
            ],
            "id" => 0
        ];
        return $this->sendCommand($input);
    }

    public function pay($bolt11, $msatoshi) 
    {
        $input = [
            "method" => "pay",
            "params" => [
                "bolt11" => $bolt11,
            ],
            "id" => 0
        ];
        return $this->sendCommand($input);
    }

}
