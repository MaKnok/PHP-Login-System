<?php

//force the user to be logged in or redirect

function ForceLogin(){
  if(isset($_SESSION['user_id'])){
  //user allowed
  }else{
  //user not allowed
  header("Location:/php-login-course/login.php");exit;
  }  
}

function ForceDashboard(){
  if(isset($_SESSION['user_id'])){
  //user allowed
   header("Location:/php-login-course/dashboard.php");exit;
  }else{
  //user not allowed
 
  }  
}

?>