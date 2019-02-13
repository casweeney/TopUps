<?php
	require_once("functions.php");
	require_once("database.php");
	
	class User {
		public $id;
		public $fullname;
		public $email;
		public $phone;
		public $password;
		public $created_at;
		public $account_balance;

		public function find_all_users(){
			return self::find_by_sql("SELECT * FROM users");
		}

		public static function find_by_id($id=0){
			global $database; // Calling the Database variable from the database.php file
			$result_array = self::find_by_sql("SELECT * FROM users WHERE id = {$id} LIMIT 1");
			return !empty($result_array) ? array_shift($result_array) : false;
		}


		public static function find_by_sql($sql=""){
			global $database; // Calling the Database variable from the database.php file
			$result_set = $database->query($sql);
			$object_array = array();
			while($row = $database->fetch_data($result_set)){
				$object_array[] = self::instantiate($row);
			}

			return $object_array;
		}

		public static function authenticate($phone="", $password=""){
			global $database; // Calling the Database variable from the database.php file
			$phone = $database->escaped_string($phone);
			$password = $database->escaped_string($password);

			$sql = "SELECT * FROM users ";
			$sql .= "WHERE phone = '{$phone}' ";
			$sql .= "AND password = '{$password}' ";
			$sql .= "LIMIT 1";

			$result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
		}

		private static function instantiate($record){
			// We could check that record exist and is an array

			// This step is a simple but a long form approach:
			$object = new self;
			/*$object->id = $record['id'];
			$object->username   = $record['username'];
			$object->password   = $record['password'];
			$object->firstname  = $record['firstname'];
			$object->lastname   = $record['lastname'];*/

			// A more dynamic and short form approach of the same code above:
			foreach ($record as $attribute => $value) {
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}

			return $object;
		}

		private function has_attribute($attribute){
			// get_object_vars returns an associative array with all attributes
			// (incl. private ones!) as keys and their current values as the values
			$object_vars = get_object_vars($this);

			//We don't care about the values, we just want to know if the key exist
			//Will return true or false
			return array_key_exists($attribute, $object_vars);
		}
	}


	class Network {
		public $id;
		public $network_name;

		public function get_all_networks(){
			return self::find_by_sql("SELECT * FROM network");
		}

		public static function find_by_id($id=0){
			global $database; // Calling the Database variable from the database.php file
			$result_array = self::find_by_sql("SELECT * FROM network WHERE id = {$id} LIMIT 1");
			return !empty($result_array) ? array_shift($result_array) : false;
		}

		public static function find_by_sql($sql=""){
			global $database; // Calling the Database variable from the database.php file
			$result_set = $database->query($sql);
			$object_array = array();
			while($row = $database->fetch_data($result_set)){
				$object_array[] = self::instantiate($row);
			}

			return $object_array;
		}

		private static function instantiate($record){
			// We could check that record exist and is an array

			// This step is a simple but a long form approach:
			$object = new self;
			/*$object->id = $record['id'];
			$object->username   = $record['username'];
			$object->password   = $record['password'];
			$object->firstname  = $record['firstname'];
			$object->lastname   = $record['lastname'];*/

			// A more dynamic and short form approach of the same code above:
			foreach ($record as $attribute => $value) {
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}

			return $object;
		}

		private function has_attribute($attribute){
			// get_object_vars returns an associative array with all attributes
			// (incl. private ones!) as keys and their current values as the values
			$object_vars = get_object_vars($this);

			//We don't care about the values, we just want to know if the key exist
			//Will return true or false
			return array_key_exists($attribute, $object_vars);
		}
	}

    class Admin {

		public $id;
		public $username;
		public $password;
		public $reg_date;

		public function find_all_admin(){
			return self::find_by_sql("SELECT * FROM admin");
		}

		public static function find_by_id($id=0){
			global $database; // Calling the Database variable from the database.php file
			$result_array = self::find_by_sql("SELECT * FROM admin WHERE id = {$id} LIMIT 1");
			return !empty($result_array) ? array_shift($result_array) : false;
		}


		public static function find_by_sql($sql=""){
			global $database; // Calling the Database variable from the database.php file
			$result_set = $database->query($sql);
			$object_array = array();
			while($row = $database->fetch_data($result_set)){
				$object_array[] = self::instantiate($row);
			}

			return $object_array;
		}

		public static function authenticate($username="", $password=""){
			global $database; // Calling the Database variable from the database.php file
			$username = $database->escaped_string($username);
			$password = $database->escaped_string($password);

			$sql = "SELECT * FROM admin ";
			$sql .= "WHERE username = '{$username}' ";
			$sql .= "AND password = '{$password}' ";
			$sql .= "LIMIT 1";

			$result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
		}

		private static function instantiate($record){
			// We could check that record exist and is an array

			// This step is a simple but a long form approach:
			$object = new self;
			/*$object->id = $record['id'];
			$object->username   = $record['username'];
			$object->password   = $record['password'];
			$object->firstname  = $record['firstname'];
			$object->lastname   = $record['lastname'];*/

			// A more dynamic and short form approach of the same code above:
			foreach ($record as $attribute => $value) {
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}

			return $object;
		}

		private function has_attribute($attribute){
			// get_object_vars returns an associative array with all attributes
			// (incl. private ones!) as keys and their current values as the values
			$object_vars = get_object_vars($this);

			//We don't care about the values, we just want to know if the key exist
			//Will return true or false
			return array_key_exists($attribute, $object_vars);
		}
	}