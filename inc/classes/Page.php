<?php

//if there's no constant defined called '__CONFIG__', does not load the file
if (!defined('__CONFIG__')){

		exit('You don\'t have a config file');
	
}

class Page{
//force the user to be logged in or redirect

  static function ForceLogin(){
    if(isset($_SESSION['user_id'])){
    //user allowed
    }else{
    //user not allowed
    header("Location:/php-login-course/login.php");exit;
    }  
  }

  static function ForceDashboard(){
    if(isset($_SESSION['user_id'])){
    //user allowed
    header("Location:/php-login-course/dashboard.php");exit;
    }else{
    //user not allowed
 
    }  
  }
}

?>