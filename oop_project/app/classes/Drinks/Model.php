<?php

// App == app/classes
// it will take all files from Drinks folder
namespace App\Drinks;

class Model {
    private $db; // make private because we do not give user to access our load()...
    private $table_name = 'drinks';

    public function __construct() {
        $this->db = new \Core\FileDB(DB_FILE);
        $this->db->load();
        $this->db->createTable($this->table_name);
    }

    public function insert(Drink $drink) {
        return $this->db->insertRow($this->table_name, $drink->getData());
    }

    public function get($conditions) {
        $drinks = [];
       $rows = $this->db->getRowsWhere($this->table_name, $conditions);
       foreach($rows as $row) { // ???
            $drinks[] = new Drink($row); // works 
       }
       return $drinks;
    }

    public function update(Drink $drink) {
        // table_name, row_id, drink array change for to $drink->getId ???
        $this->db->updateRow($this->table_name, 4, $this->insert($drink));
    }

    /**
     * @param $drink class Drink object
     */
    public function delete(Drink $drink) {
        $this->db->deleteRow($this->table_name, $drink->getId());
    }

    public function __destruct() {
        $this->db->save();
    }
}

// objektu array 