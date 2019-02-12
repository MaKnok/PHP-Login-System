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

		$user_found = User::Find($email);

		//make sure the user CAN be added and is added;
		if ($user_found){
			//the user exists
			//we can also check if they are able to log in
			$return['error'] = 'You already have an account';
			$return['is_logged_in'] = false;
		}else{
			//the user does not exist. add them now
		 $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

		 $addUser = $con->prepare("INSERT INTO users(email,password) VALUES(LOWER(:email),:password)");
		 $addUser->bindParam(':email', $email, PDO::PARAM_STR);
		 $addUser->bindParam(':password', $password, PDO::PARAM_STR);
		 $addUser->execute();

		 $user_id = $con->lastInsertId();

		 $_SESSION['user_id'] = (int) $user_id;
		 $return['redirect'] = 'php-login-course/dashboard.php?message=welcome';
		 $return['is_logged_in'] = true;

		}
		
		echo json_encode($return, JSON_PRETTY_PRINT);exit;

	}else{
		//redirect the user 
		exit('Invalid URL');
	}

?>



