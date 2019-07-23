<?php

class FileDB {

	private $file_name;
	private $data;

	public function __construct($file_name) {
		$this->file_name = $file_name;
	}

	/**
	 * methods for tables
	 * @param $table_name string
	 */
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

	public function truncateTable($table_name) {
		if(isset($this->data[$table_name])) {
			$this->data[$table_name] = [];
		}

		return false;
	}
	// methods for tables ends

	/**
	 * @param $row_id string|int
	 */
	public function rowExists($table_name, $row_id) {
		if(isset($this->data[$table_name][$row_id])) {
			return true;
		}

		return false;
	}

	/**
	 *@param $row array - row data
	 */
	public function insertRow($table_name, $row, $row_id = null) {
		if($this->tableExists($table_name)) {
			$row_id = count($this->data[$table_name]);
			($row_id === null ? $this->data[$table_name][] = $row : $this->data[$table_name][$row_id] = $row);
			return true;
		}
		return false;
	}

	public function rowInsertIfNoExists($table_name, $row, $row_id) {
		if(!rowExists($table_name, $row_id)) {
			return $this->insertRow($table_name, $row, $row_id);
		}
		return false;
	}

	public function updateRow($table_name, $row_id, $row) {
		if(isset($this->data[$table_name][$row_id][$row])) {
			$this->data[$table_name][$row_id][$row] = [];
		} 
	}

	public function deleteRow($table_name, $row_id) {
		if(isset($this->data[$table_name][$row_id])) {
			unset($this->data[$table_name][$row_id]);
		} 
	}

	public function getRow($table_name, $row_id) {
		if($this->rowExists($table_name, $row_id)) {
			return $this->data[$table_name][$row_id];
		}

		return false;
	}

	public function getRowWhere($table_name, array $conditions) {
		$this->data[$table_name];
		foreach($this->data[$table_name] as $row) {
			foreach($conditions as $condition_key => $condition) {
				if($row[$condition_key] === $conditions[$condition_key]) {
					// if exists it will return once
					return $row;
				}
			}
			
		}
	}
	// methods for row end

	/**
	 *  methods for data
	 */
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

	public function setData($data_array) {
		$data_array = $this->data;
	}

	public function save() {
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
$file->createTable('hello');
$file->insertRow('hello', ['name' => 'Oscar'], null);
$file->insertRow('hello', ['name' => 'Oscar'], null);
$file->insertRow('hello', ['name' => 'Oscar'], null);
$file->insertRow('hello', ['name' => 'Odd'], null);


var_dump($file->getData());
var_dump($file->getRowWhere('hello', ['name' => 'Oscar']));

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
		<body>
		</body>
</html>