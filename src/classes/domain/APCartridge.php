<?php
namespace domain;
class APCartridge extends Ammo
{
    public function __construct(Gun $gun)
    {
        parent::__construct($gun, "підкаліберний");
    }

    function getDamage()
    {
        return parent::getDamage() * 0.3;
    }

    function getHitPointThicknes()
    {
        return 0.7;
    }
    
}


?>