<?php

namespace App;
namespace Core;

class App {

    public function __construct() {
        $db = new Core\FileDB(DB_FILE);
    }
}