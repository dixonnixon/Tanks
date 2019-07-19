<?php
namespace domain;
abstract class Armour
{
    private $thickness;
    private $type;

    public function __construct($thickness, $type)
    {
        $this->thickness = $thickness;
        $this->type = $type;
    } 

    function isPenetrated(Ammo $ammo)
    {
        return ($ammo->getDamage() > $this->thickness * $ammo->getHitPointThicknes());
    }

    function getType()
    { return $this->type; }
}
?>