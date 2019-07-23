<?php

class Drink {
    private $data = [];

    public function setName(string $name) {
        $this->data['name'] = $name;
    }

    public function setAmountMl(int $amount_ml) {
        $this->data['amount'] = $amount_ml;
    }

    public function setAbarot(float $abarot) {
        $this->data['abarot'] = $abarot;
    }

    public function setImage(string $image) {
        $this->data['image'] = $image;
    }

    /**
     * gets starts
     */
    public function getName() {
       return $this->data['name'];
    }

    public function getAmountMl() {
        return $this->data['amount'];
    }

    public function getAbarot() {
        return $this->data['abarot'];
    }

    public function getImage() {
        return $this->data['image'];
    }
}