<?php

//get_form_input
require '../bootloader.php';
/**
 * composer:
 * class reloading
 * composer dump-autoload if do not work
 * php_oop_project.com
 */


$nav = [
    'left' => [
        ['url' => '/', 'title' => 'Home']
    ]
];

//Model::$db = new Core\FileDB(DB_FILE);
Model::$db->createTable('test_table');
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

// getting object array
/**
 * [
 *      {}
 *      {}
 * ]
 */
$drinks = $model->get([]);

var_dump('Drink:', $drinks);
// $drink->setId(0);
// $model->update($drink);

// empty drinks task 2
// foreach($drinks as $drink) {
//     $model->delete($drink);
// }

//$model->insert($drink);
//var_dump($model->get(['name' => 'Moscovskaja']));

 //var_dump($model->delete($drink));

// var_dump($model->get(['name' => 'lala']));
// cannot use $fileDB->load(); because it is inside __construct in Model.php
// var_dump('Drink:', $drink);

$form = [
    'fields' => [
        'drink_name' => [
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Type drink here'
                ],
                'validators' => [
                    'validate_not_empty',
                ]
            ],
        ],
        'amount_ml' => [
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Type amount here'
                ],
                'validators' => [
                    'validate_not_empty',
                ]
            ],
        ],
        'abarot' => [
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Type abarot here'
                ],
                'validators' => [
                    'validate_not_empty',
                ]
            ],
        ],
        'image' => [
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Type image here'
                ],
                'validators' => [
                    'validate_not_empty',
                ]
            ],
        ]
    ],

        'buttons' => [
            'add' => [
                'title' => 'add',
                'extra' => [
                    'attr' => [
                        'class' => 'red-btn'
                    ]
                ]
            ],
        ],
        'callbacks' => [
            'success' => 'form_success',
            'fail' => 'form_fail'
        ]
];

function add_drink(Drink $drink) {
    switch(get_form_action()) {
        case 'add':
        $drink->setName($_POST['drink_name']);
        $drink->setAmount($_POST['amount_ml']);
        $drink->setAbarot($_POST['abarot']);
        $drink->setImage($_POST['image']);
            $model->insert($drink);
            break;
    }
}

function form_success($filtered_input, &$form) {
    $drink = new App\Drinks\Drink();
    add_drink($drink);
}
// Get all data from $_POST
$input = get_form_input($form);

// If any data was entered, validate the input
if (!empty($input)) {
    $filtered_action = get_form_action();
    $success = validate_form($input, $form);

   if($success){
    get_form_action();
   }
}

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
