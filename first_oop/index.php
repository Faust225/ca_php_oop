<?php

class FileDB {

	private $file_name;
	private $data;

	public function __construct($file_name) {
		$this->file_name = $file_name;
	}

	public function tableExists($table_name) {
		if(isset($this->data[$table_name])) {
			return true;
		}
		return false;
	}

	public function createTable($table_name) {
		if ($this->tableExists($table_name)) {
			return false;
		}
		$this->data[$table_name] = [];
		return true;
	}

	public function dropTable($table_name) {
		if(isset($this->data[$table_name])) {
			unset($this->data[$table_name]);
			return true;
		}
		return false;
	}

	public function insertRow($table_name, $row, $row_id = null) {
		if($this->tableExists($table_name)) {
			$row_id = count($this->data[$table_name]);
			if($row_id === null) {
				$row_id = 0;
			}
			$this->data[$table_name][$row_id][] = $row;
			return true;
		}
		return false;
	}

	public function truncateTable($table_name) {
		if(isset($this->data[$table_name])) {
			$this->data[$table_name] = [];
		}
		return false;
	}

	// for arrays
	public function load() {
		// check if file exists
		if (file_exists($this->file_name)) {
			$encoded_string = file_get_contents($this->file_name);

			// check if file is not empty
        if ($encoded_string !== false) {
            $this->data = json_decode($encoded_string, true);
        	}   
		}
	}

	public function getData() {
		if($this->data === null) {
			$this->load();
		}
			return $this->data;
	}

	public function setData($data_array) { // paimti arraju
		$data_array = $this->data;
	}

	public function save() { // issaugoti i faila
		$array_encode_to_jason_string = json_encode($this->data);
		$success = file_put_contents($this->file_name, $array_encode_to_jason_string); //$success atiduoda irasyta baitu skaiciu arba false
		if($success !== FALSE) {
			return true;
		} else {
			return false;
		}
	}
}

$file = new FileDB('info.txt');
$file->load();
var_dump($file->getData());
$file->createTable('hello');

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
		<body>
		</body>
</html>