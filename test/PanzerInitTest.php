<?php
use PHPUnit\Framework\TestCase;
use domain\HArmour;
use domain\Panzer;
use domain\Gun;
use domain\HECartridge;
use domain\HEATCartridge;
use domain\APCartridge;
use tanks\Config;

class PanzerInitTest extends TestCase
{
    function testPanzerInit()
    {
        $p = new Panzer("IS-2", new Gun(55, 42), 90, 600);
        $this->assertEquals($p->getName(), "IS-2");

        $this->assertEquals($p->getLoadedAmmo()->getName(), "підкаліберний");
        // $this->assertEquals(Config::$armourTypes[0], "підкаліберний");

        $p->loadGun(Config::$ammoTypes[0]);
        $p->selectArmour(Config::$armourTypes[0]);

        echo $p;

        if($ammo = $p->Shoot())
        {
            $p->handleHit($ammo);
        }

        print_r($p->getHealth());
    }
}
?>