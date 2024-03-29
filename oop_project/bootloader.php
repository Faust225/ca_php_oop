<?php

declare(strict_types = 1);
require 'config.php';

require ROOT . '/vendor/autoload.php';

$app = new App\App();
// Load Core Classes
// require ROOT . '/core/classes/FileDB.php';

// Load Core Functions
require ROOT . '/core/functions/form/core.php';
require ROOT . '/core/functions/html/builder.php';

// Load App Classes
// require ROOT . '/app/classes/Drink.php';

// Load App Functions
//...