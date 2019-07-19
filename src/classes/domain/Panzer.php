<?php
namespace domain;
class Panzer
{
    private $model;
    private $gun;

    private $armours = [];
    private $ammos = [];
    private $health;

    private $loadedAmmo;
    private $selectedArmour;

    public function __construct($name, Gun $gun, $armWidth, $health)
    {
        $this->model = $name;
        $this->gun = $gun;
        $this->health = $health;
        $this->armours = [];
        $this->ammos = [];
        $this->addArmours($armWidth);
        $this->addAmmos();

        $this->loadedAmmoIndex = null;
        $this->selectedArmour = $this->armours[0];
    }

    public function loadGun($type)
    {
        for($i = 0; $i < count($this->ammos); $i++)
        {
            if($this->ammos[$i]->getName() == $type)
            {
                $this->loadedAmmoIndex = $i;
                echo "\nснаряд завантежено!";
                return;
            }
        }
        echo "\nвибач босс! снгарядів типу {$type} більше немає...";
    }

    public function selectArmour($type)
    {
        for($i = 0; $i <  count($this->armours); $i++)
        {
            if($this->armours[$i]->getType() == $type)
            {
                $this->selectedArmour = $this->armours[$i];
                echo "\nброню вибрано!";
                return;
            }
        }
    }

    public function Shoot()
    {
        $ammoIdx = $this->loadedAmmoIndex;
        if($this->loadedAmmoIndex !== null)
        {
            echo "\nТанк {$this->model} стріляє снарядом {$this->ammos[$ammoIdx]->getName()}\n";
            $firedAmmo = clone $this->ammos[$ammoIdx];
            unset($this->ammos[$ammoIdx]);
            $dice = rand(0, 100);
            $hit = $this->gun->isOnTarget($dice);

            if($hit)
            {
                echo "Влучив!\n";
                return $firedAmmo;
            }
            else 
            {
                echo "Промах!\n";
                return null;
            }
        }
        else echo "не заряжено\n";
        return null;
    }

    public function handleHit(Ammo $ammo)
    {
        if($this->selectedArmour->isPenetrated($ammo))
            $this->health -= $ammo->getDamage();
        else    
            echo "Броня не пробита";
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getName()
    {
        return $this->model;
    }

    public function getLoadedAmmo()
    {
        return current($this->ammos);
    }

    public function getSelectedArmour()
    {
        return current($this->armours);
    }
    

    private function addArmours($armWidth)
    {
        $this->armours[] = new HArmour($armWidth);
        $this->armours[] = new PArmour($armWidth);
    }

    private function addAmmos()
    {
        $this->ammos[] = new APCartridge($this->gun);
        $this->ammos[] = new HEATCartridge($this->gun);
        $this->ammos[] = new HECartridge($this->gun);
    }

    public function __toString()
    {
        return "\nTank {$this->model}\n Поточний стан {$this->health}\n  
            Завантажений снаряд = {$this->getLoadedAmmo()->getName()}\n
            Вибрана броня = {$this->getSelectedArmour()->getType()}\n";
    }

}
?>