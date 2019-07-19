<?php
namespace domain;
class HArmour extends Armour
{
    function __construct($thickness)
    {
        parent::__construct($thickness, "гомогенна");
    }

}
?>