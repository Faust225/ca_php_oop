<?php

/**
 * 1 Enter money value
 * 2 money inside machine
 * 3 what candy choosed OUTPUT
 * 4 number of candies left
 * 
 */
class CandyMachine {

    private const CANDYLIMIT = 10;
    private $machine_money = 7;
    private $user_money;
    private $money_back;

    public function __construct($user_money) {
        $this->user_money = $user_money;
    }

    private $candy_machine = [
        'mars' => [
            'number_of_candies' => 10,
            'cost' => 1.5
        ],
        'snickers' => [
            'number_of_candies' => 10,
            'cost' => 1
        ]
    ];

    private function fillMachine() {
        if($this->machine_money < 5) {
            $this->machine_money = 5;
        }

        foreach($this->camdy_machine as $candy) {
            if($candy['number_of_candies'] < 10) {
                $candy['number_of_candies'] = 10;
            }
        }
    }

    // calculate how much machine will return
    private function calculate($candy_name) {

        // if user has more or enought money to buy a candy. Continue
        if($this->user_money >= $this->candy_machine[$candy_name]['cost']) {
            $this->machine_money += $this->user_money;

            if($this->user_money > $this->candy_machine[$candy_name]['cost']) {
                $money_return = $this->user_money - $this->candy_machine[$candy_name]['cost'];
                $this->machine_money -= $money_return;
                print 'user money left: ' . $money_return . '<br>';
                return true;
            }
        }
        print 'not enought money ';
        return false;
    }

    public function takeCandy($candy_name) {
        
            // check if candy is available
            if($this->candy_machine[$candy_name]['number_of_candies'] > 0) {
                $this->candy_machine[$candy_name]['number_of_candies']--;

                // output
                print $candy_name . "<br>";
                print 'number of chocolates left ' . $this->candy_machine[$candy_name]['number_of_candies'] . "<br>";
                print 'user money ' . $this->user_money . "<br>";
                print 'chocolate price ' .  $this->candy_machine[$candy_name]['cost'] . "<br>";
                $this->calculate($candy_name);
                print 'money inside machine ' . $this->machine_money;
                return true;
            }
            print 'chocolate 404';
    }
}

$candy = new CandyMachine(5);
var_dump($candy->takeCandy('mars'));
var_dump($candy);

?>