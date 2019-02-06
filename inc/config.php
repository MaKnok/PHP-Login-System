<?php

	//if there's no constant defined called '__CONFIG__', does not load the file
	if (!defined('__CONFIG__')){

		exit('You haven\'t defined config');
	
	}

	//sessions are already turned on
	if(!isset($_SESSION)){
		session_start();
	}

	//our config is below
	//allow errors
	error_reporting(-1);
	ini_set('display_errors','0n');

	//include the DB.php file

	include_once "classes/DB.php";
	include_once "classes/Filter.php";

	$con = DB::getConnection();


?>