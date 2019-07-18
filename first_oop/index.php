<?php

class Calculate {

	public function __construct($number1, $number2, $action) {
		switch ($action) {
			case '+':
				print $number1 + $number2; break;
			case '-':
				print $number1 - $number2; break;
			case '*':
				print $number1 * $number2; break;
			case '/':
				print $number1 / $number2; break;
		}
	}

}

$math_action = new Calculate(55, 5, '-');
// print $math_action;
// class FileDB {
// 	private $file_name;
// 	private $data;

// 	public function __construct($file_name) {
// 		$this->file_name = $file_name;
// 	}

// 	public function load() {
// 		// check if file exists
// 		if (file_exists($this->file_name)) {
// 			$encoded_string = file_get_contents($this->file_name);

// 			// check if file is not empty
//         if ($encoded_string !== false) {
//             $this->data = json_decode($encoded_string, true);
//         	}   
// 		}
// 	}

// 	public function getData() {
// 		if($this->data === null) {
// 			$this->load();
// 		}
// 			return $this->data;
// 	}

// 	public function setData($data_array) { // paimti arraju
// 		$data_array = $this->data;
// 	}

// 	public function save() { // issaugoti i faila
// 		$array_encode_to_jason_string = json_encode($this->data);
// 		$success = file_put_contents($this->file_name, $array_encode_to_jason_string); //$success atiduoda irasyta baitu skaiciu arba false
// 		if($success !== FALSE) {
// 			return true;
// 		} else {
// 			return false;
// 		}
// 	}
// }

// $file = new FileDB('info.txt');
// $file->load();
// var_dump($file->getData());

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
		<body>
		</body>
</html>