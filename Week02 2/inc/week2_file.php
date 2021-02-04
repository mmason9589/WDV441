<?php


session_start();
	
	$fName = '';
	$lName = '';
	$dateOfBirth = '';
	$senderEmail = '';
	$messageField = '';
	$errFName = '';
	$errLName = '';
	$errDOB = '';
	$errEmail = '';
	$errMessage = '';
	$emailSuccess = '';

	if(isset($_POST['emailSubmit'])){
		
		$fName = $_POST['fName'];	//grab first name from form
		$lName = $_POST['lName'];	//grab last name from form
		$dateOfBirth = $_POST['dateOfBirth'];	//grab date of birth from form
		$senderEmail = $_POST['senderEmail'];	//grab sender email from form
		$messageField = $_POST['contactMessage'];	//grab message from form
		$toEmail = "mmason@designdefined.org";		//email address receiver
		$subjectInquiry = 'New Inquiry';
		$headers = "From: $senderEmail" . "\r\n";	//email address of sender
		
		$emailBody = "$fName $lName " . "has an inquiry." ."\n". "Date of Birth: $dateOfBirth" ."\n". "Sender email: $senderEmail" ."\n". "Message: $messageField";
		
		
		
		//validate first name field
		function validateFName($inFirstName){
			global $validForm, $errFName;
			$errFName = '';
			
			if($inFirstName == ''){
				$validForm = false;
				$errFName = 'Field can not be blank.';
			}
			elseif(!preg_match("/^[a-zA-Z ]*$/", $inFirstName)){
				$validForm = false;
				$errFName = 'Please enter a valid name.';
			}
		}
		
		
		//validate last name field
		function validateLName($inLastName){
			global $validForm, $errLName;
			$errLName = '';
			
			if($inLastName == ''){
				$validForm = false;
				$errLName = 'Field can not be blank.';
			}
			elseif(!preg_match("/^[a-zA-Z ]*$/", $inLastName)){
				$validForm = false;
				$errLName = 'Please enter a valid name.';
			}
		}
		
		
		//validate date of birth field
		function validateDOB($inDOB){
			global $validForm, $errDOB;
			$errDOB = '';
			
			if($inDOB == ''){
				$validForm = false;
				$errDOB = 'Field can not be blank.';	
			}
			elseif(!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/", $inDOB)){
				$validForm = false;
				$errDOB = 'Please enter a valid date: (mm/dd/yyyy).';
			}
			
		}
		
		
		//validate sender email field
		function validateEmail($inEmail){
			global $validForm, $errEmail;
			$errEmail = '';
		
			if($inEmail == ''){
				$validForm = false;
				$errEmail = 'Field can not be blank';
			}
			elseif(!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/",$inEmail)){
				$validForm = false;
				$errEmail = 'Please enter a valid email address';
			}
		}
		
		
		//validate message field
		function validateMessage($inMessage){
			global $validForm, $errMessage;
			$errMessage = '';
			
			if($inMessage == ''){
				$validForm = false;
				$errMessage = 'Field can not be blank';
			}
		}
		
		
		//Form is true by default
		$validForm = true;
		
		validateFName($fName);	
		validateLName($lName);
		validateDOB($dateOfBirth);
		validateEmail($senderEmail);
		validateMessage($messageField);
		
		
		if($validForm){
			
			//sends email with all pieces together
			mail($toEmail,$subjectInquiry,$emailBody,$headers);
			
			//echo message was sent
			$emailSuccess = "Message sent successfully!";
			
			//if message is successful and sends, reset all fields
			$fName = '';
			$lName = '';
			$dateOfBirth = '';
			$senderEmail = '';
			$messageField = '';
			
		}
		
	}



?>