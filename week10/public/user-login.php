<?php
session_start();
	require_once('../inc/users.class.php');

	// create an instance of our class so we can use it
	$user = new Users();

	$message = "";

	if(isset($_POST["Login"])){
		
		if(empty($_POST["username"]) || empty($_POST["password"])){  
			
			$message = '<h3 style="color: red">All fields are required</h3>';  
		}
		else{
			
			$userid = $user->userLogin($_POST["username"], $_POST["password"]);
			
			if($_SESSION['validUser'] == 'yes'){
				header('location: user-home.php');
			}
			else{
				$message = "Please enter a correct username and password. <br><br>";
			}
		}
	}

	if (isset($_POST['Cancel'])) {
	header('location: user-list.php');
	exit;
	}

	require_once('../tpl/user-login.tpl.php');

?>

