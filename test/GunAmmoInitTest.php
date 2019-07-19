<?php
use PHPUnit\Framework\TestCase;
use domain\Gun;
use domain\HECartridge;
use domain\HEATCartridge;
use domain\APCartridge;

class GunAmmoInitTest extends TestCase
{
    function testGunAmmoInit()
    {
        $gun = new Gun(10, 2);

        $this->assertEquals($gun->getCaliber(), 10);

        $this->assertIsBool($gun->isOnTarget(3));
        $this->assertSame($gun->isOnTarget(3), false);
       
        $ammoHE = new HECartridge($gun);
        $ammoHEAT = new HEATCartridge($gun);
        $ammoAP = new APCartridge($gun);
        $this->assertEquals($ammoHE->getDamage(), 30, 'Asserting AmmoDamage false');

        echo $ammoHE;
        echo $ammoHEAT;
        echo $ammoAP;
    }
    
}
?>