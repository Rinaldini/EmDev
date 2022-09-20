<?php

class DB{
	public static function connToDB() {
		include("db_login.php");
		$conn = new PDO("mysql:dbname=$db_name,dbhost=$db_host", $db_user, $db_pass);
		return $conn;
	}
}

?>