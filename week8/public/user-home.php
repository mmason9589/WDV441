<?php 
session_start();

	require('../inc/users.class.php');

	$user = new Users();

	$userArray = array();

	if(isset($_SESSION["validUser"])  &&  $_SESSION["validUser"] == "yes" ){
		
		$userid = $_SESSION['userid'];
		
		// load the user if we have it
		$user->load($userid);
    	$userArray = $user->userData;

		
		//var_dump($userArray);
		
		//var_dump($userid);
	}

	require_once('../tpl/user-home.tpl.php');
?>
