<?php

class FileDB {
	private $file_name;
	private $data;

	public function __construct($file_name) {
		$this->file_name = $file_name;
	}

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
		} else {
			return $this->data;
		}
	}

	public function setData($data_array) { 

	}

	public function save() {

	}
}

$file = new FileDB('info.txt');
$file->load();
var_dump($file->getData());

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
		<body>
		</body>
</html>