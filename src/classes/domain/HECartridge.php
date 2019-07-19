<?php
namespace domain;
class HECartridge extends Ammo
{
    public function __construct(Gun $gun)
    {
        parent::__construct($gun, "фугасний");
    }

    function getDamage()
    {
        return parent::getDamage();
    }

    function getHitPointThicknes()
    {
        return 1.2;
    }
}


?>