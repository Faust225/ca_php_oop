<?php

// App == app/classes
// it will take all files from Drinks folder
namespace App\Drinks;

class Model {
    public static $db; // make private because we do not give user to access our load()...
    private $table_name = 'drinks';

    public function __construct() {
        self::$db = new \Core\FileDB(DB_FILE);
        self::$db->load();
        self::$db->createTable($this->table_name);
    }
    /**
     * @param Drink $drink
     * @return new row in table with new data
    */
    public function insert(Drink $drink) {

        // $table_name string, $row array, $row_id optional
        return self::$db->insertRow($this->table_name, $drink->getData());
    }

    public function get($conditions) { // !!!***
        $drinks = [];
       $rows = self::$db->getRowsWhere($this->table_name, $conditions);
       foreach($rows as $row_id => $row) { // ???
            $row['id'] = $row_id;
            $drinks[] = new Drink($row); // works 
       }
       return $drinks;
    }

    public function update(Drink $drink) {
        // table_name, row_id, drink array change for to $drink->getId ???
        return self::$db->updateRow($this->table_name, $drink->getId(), $drink->getData());
    }

    /**
     * @param $drink class Drink object
     */
    public function delete(Drink $drink) {
        self::$db->deleteRow($this->table_name, $drink->getId());
    }

    public function __destruct() {
        self::$db->save();
    }
}

// objektu array 

