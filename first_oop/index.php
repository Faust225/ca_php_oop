<?php

/**
 * 
 */
class FileDB {
	private $file_name;
	private $data;

	public function __construct($file_name) {
		$this->file_name = $file_name;
	}

	public function load() { // array from file
		if (file_exists($this->file_name)) {
			$encoded_string = file_get_contents($this->file_name);

        if ($encoded_string !== false) {
            return json_decode($encoded_string, true);
        	}   
		}
	}


	public function getData() {
		$this->data = load();
	}

	public function setData($data_array) { 

	}

	public function save() {

	}
}

$file = new FileDB('info.txt');
var_dump($file->load());

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
		<body>
		</body>
</html>