<?php

/**
 * 
 */
class ThailandSurprise {
	public $clothes;
	private $balls;

	public function __construct() {
		$this->balls = rand(0, 1);
	}
}

$surprise = new ThailandSurprise();
var_dump($surprise);
