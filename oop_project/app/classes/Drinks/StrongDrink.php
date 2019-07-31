<?php

namespace App\Drinks;
class StrongDrink extends Drink {
    public function drink() {
        // Su this
        $this->setAmount($this->getAmount() - 50);
        
        // Su parent::
        //parent::setAmount(parent::getAmount() - 50);        
    }
}