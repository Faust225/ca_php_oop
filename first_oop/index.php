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

	public function attachBalls() {
		return $this->balls = 1;
	}

	public function detachBalls() {
		return $this->balls = 0;
	}
}

$surprise = new ThailandSurprise();
print $surprise->attachBalls() . ' ';
print $surprise->detachBalls();