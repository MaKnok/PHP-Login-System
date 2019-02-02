<?php 
	//allow the config
	define('__CONFIG__',true);
	//require the config
	require_once "../inc/config.php";

	

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		header("Content-type: application/json");

		$return = [];

		//make sure the user does not exist;

		//make sure the user CAN be added and is added;

		//return the proper information back to javascript to redirect us; 

		$return['redirect'] = '/dashboard.php';
		$return['name'] = 'Marina Knok';
	

		echo json_encode($return, JSON_PRETTY_PRINT);exit;

	}else{
		//redirect the user 
		exit('Sorry, you don\'t have access to this page');
	}

?>



