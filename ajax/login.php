<?php 
	//allow the config
	define('__CONFIG__',true);
	//require the config
	require_once "../inc/config.php";


	

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//header("Content-type: application/json");

		$return = [];

		$email = Filter::String( $_POST['email'] );
		$password = $_POST['password'];

		$user_found = User::Find($email, true);

		//make sure the user CAN be added and is added;
		if ($user_found){
			//the user exists,try and sign them in
			//we can also check if they are able to log in

			$user_id = (int) $user_found['user_id'];
			$hash = (string) $user_found['password'];

			if (password_verify($password,$hash)){
				//user is signed in
				$return['redirect'] = 'php-login-course/dashboard.php';
				$_SESSION['user_id'] = $user_id; 
			}else{
				//invalid user/password combo
				$return['error'] = 'Invalid user email/password combo';
			}

	
		}else{
			//they need to create a new account
			$return['error'] = "You don\'t have an account. <a href='register.php'>Create one now </a>";
		}
		
		echo json_encode($return, JSON_PRETTY_PRINT);exit;

	}else{
		//redirect the user 
		exit('Invalid URL');
	}

?>



