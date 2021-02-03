<?php 

require "../header.php";


 if(isset($_POST['login-submit'])){

 	$username = $_POST['username'];
    $password = $_POST['password'];

    $loginUser = new UserLogin($username, $password);
    $loginUser->login();

 } 
