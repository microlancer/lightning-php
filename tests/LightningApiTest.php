<?php

use Lightning\LightningApi;

class LightningApiTest extends PHPUnit_Framework_TestCase
{
    public function testGetInfo()
    {
        $lightningApi = new LightningApi();
        $rpcFile = "/home/user/.lightning/lightning-rpc";
        $lightningApi->setRpcFile($rpcFile);
        
        $info = $lightningApi->getinfo();
        
        $this->assertTrue($info->id);
    }
}
