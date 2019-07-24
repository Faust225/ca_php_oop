<?php

declare (strict_type = 1);

class Drink {
    private $data = [];

    public function setName(string $name) {
        $this->data['name'] = $name;
    }

    public function setAmountMl(int $amount_ml) {
        $this->data['amount_ml'] = $amount_ml;
    }

    public function setAbarot(float $abarot) {
        $this->data['abarot'] = $abarot;
    }

    public function setImage(string $image) {
        $this->data['image'] = $image;
    }

    public function setData($data) {
        $this->setName($data['name'] ?? null);
        $this->setAmountMl($data['amount_ml'] ?? null);
        $this->setAbarot($data['abarot'] ?? null);
        $this->setImage($data['image'] ?? null);

        // $this->data = $data; my way
    }

    /**
     * gets starts
     */
    public function getName() {
       return $this->data['name'];
    }

    public function getAmountMl() {
        return $this->data['amount_ml'];
    }

    public function getAbarot() {
        return $this->data['abarot'];
    }

    public function getImage() {
        return $this->data['image'];
    }

    public function getData() {
        return [
            'name' => getName(),
            'amount_ml' => getAmountMl(),
            'abarot' => getAbarot(),
            'image' => getImage()
        ];
    }
    // get methods ends

    public function __construct($data) {
        $this->data = [
            'name' => null,
            'amount_ml' => null,
            'abarot' => null,
            'image' => null
        ];

        $this->setData($data);
    }
}

