<?php

//if there's no constant defined called '__CONFIG__', does not load the file
if (!defined('__CONFIG__')){

		exit('You don\'t have a config file');
	
}

class DB {

	protected static $con; //it's a protected and static variable which we can get it by calling self::

	private function __construct() { //to create a new instance of DB (ex. $db = new DB(); )

		try {

			self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=login_course', 'MarinaKnok', 'M@zinha!1988' );
			self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );

		} catch (PDOException $e) {
			echo "Could not connect to database."; exit;
		}

	}


	public static function getConnection() {

		if (!self::$con) {
			new DB();
		}

		return self::$con;
	}
}

?>