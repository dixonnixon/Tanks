<?php
namespace domain;
class Gun
{
    private $caliber;
    private $barrelLength;

    function __construct($cal, $length)
    {
        $this->caliber = $cal;
        $this->barrelLength = $length;
    }

    public function getCaliber()
    {
        return $this->caliber;
    }

    public function isOnTarget($dice)
    {
        return ($this->barrelLength + $dice) > 100;
    }
}
?>