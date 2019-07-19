<?php
namespace domain;
class HEATCartridge extends Ammo
{
    public function __construct(Gun $gun)
    {
        parent::__construct($gun, "кумалятивний");
    }

    function getDamage()
    {
        return parent::getDamage() * 0.6;
    }

    function getHitPointThicknes()
    {
        return 1;
    }
}


?>