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

		//make sure the user does not exist;
		$findUser = $con -> prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
		$findUser -> bindParam(':email', $email, PDO::PARAM_STR);
		$findUser -> execute();

		//make sure the user CAN be added and is added;
		if ($findUser -> rowCount() == 1 ){
			//the user exists,try and sign them in
			//we can also check if they are able to log in
			$User = $findUser -> fetch(PDO::FETCH_ASSOC);
			$user_id = (int) $User['user_id'];
			$hash = (string) $User['password'];

			if (password_verify($password,$hash)){
				//user is signed in
				$return['redirect'] = 'php-login-course/dashboard.php';
				$_SESSION['user_id'] = $user_id; 
			}else{
				//invalid user/password combo
				$return['error'] = 'Invalid user email/password combo';
			}

			//$return['error'] = 'You already have an account';
	
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



