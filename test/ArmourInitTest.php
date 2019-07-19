<?php
use PHPUnit\Framework\TestCase;
use domain\HArmour;
use domain\Gun;
use domain\HECartridge;
use domain\HEATCartridge;
use domain\APCartridge;

class ArmourInitTest extends TestCase
{
    function testArmourInit()
    {
        $arm = new HArmour(100);
        $gun = new Gun(55, 42);

        $ammoHE = new HECartridge($gun);
        $ammoHEAT = new HEATCartridge($gun);
        $ammoAP = new APCartridge($gun);

        $this->assertEquals($arm->getType(), "гомогенна");

        
        $this->assertEquals($arm->isPenetrated($ammoHE), true);
        $this->assertEquals($arm->isPenetrated($ammoHEAT), false);
        $this->assertEquals($arm->isPenetrated($ammoAP), false);
    }
}