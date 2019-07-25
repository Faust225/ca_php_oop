<?php

/**
 * composer:
 * class reloading
 * composer dump-autoload if do not work
 * php_oop_project.com
 */
require '../bootloader.php';

$nav = [
    'left' => [
        ['url' => '/', 'title' => 'Home']
    ]
];

$db = new Core\FileDB(DB_FILE);
$db->createTable('test_table');
$db->insertRow('test_table', ['name' => 'Zebenkstis', 'balls' => true]);
$db->insertRow('test_table', ['name' => 'Cytis Ritinas', 'balls' => false]);
$db->updateRow('test_table', 1, ['name' => 'Rytis Citins', 'balls' => false]);

$db->rowInsertIfNotExists('test_table', 4, ['name' => 'Bubilius Kybys', 'balls' => true]);

//var_dump('All database data:', $db->getData());

$rows_with_balls = $db->getRowsWhere('test_table', ['balls' => true]);
//var_dump('Rows with balls:', $rows_with_balls);

$drink = new App\Drinks\Drink();
// $drink->setName('mano neimas');
// $drink->setAmount(2);
// $drink->setAbarot(39.5);
// $drink->setImage('/img');
$drink->setData([
    // id removed
    'name' => 'ffff',
    'amount_ml' => 1,
    'abarot' => 1,
    'image' => 'IMGLINK'
]);

// var_dump('Drink:', $drink);

// from Model.php is App\Drinks
// Model is class name inside Model.php file
$model = new App\Drinks\Model();
$drinks = $model->get([]);

// $drink->setId(0);
// $model->update($drink);

// foreach($drink_property as $drink) {
//     var_dump($drink->getName());
// }

//$model->insert($drink);
//var_dump($model->get(['name' => 'Moscovskaja']));

 //var_dump($model->delete($drink));

// var_dump($model->get(['name' => 'lala']));
// cannot use $fileDB->load(); because it is inside __construct in Model.php
// var_dump('Drink:', $drink);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OOP</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">        
        <script defer src="media/js/app.js"></script>
    </head>
    <body>
        <?php require ROOT . '/app/templates/navigation.tpl.php'; ?>
        
        <div class="content">
            <?php require ROOT . '/core/templates/form/form.tpl.php'; ?>
        </div>
        <?php foreach($drinks as $drink): ?>
        <div class="drink">
       <p>
        <?php print $drink->getName(); ?>
       </p>
       <img src="<?php print $drink->getImage(); ?>">
       </div>
<?php endforeach; ?>
    </body>
</html>
