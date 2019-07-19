<?php
namespace domain;
class PArmour extends Armour
{
    function __construct($thickness)
    {
        parent::__construct($thickness, "каліберна");
    }
}
?>