<?php
namespace domain;
abstract class Ammo
{
    private $gun;
    private $type;

    function __construct(Gun $gun, $type)
    {
        $this->gun = $gun;
        $this->type = $type;
    }

    function getName()
    { return $this->type; }

    function getDamage()
    {
        return $this->gun->GetCaliber() * 3;
    }

    protected function getPenetration()
    {
        return $this->gun->getCaliber();
    }

    public function __toString()
    {
        return "\nСнаряд {$this->type} ствола калібру {$this->gun->GetCaliber()}  пошкодження = {$this->getDamage()}\n";
    }
} 
?>