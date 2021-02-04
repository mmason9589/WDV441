<!doctype html>
<?php require("../inc/week2_file.php") ?>

<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
	
<style>

	#container{
		margin-left: auto;
		margin-right: auto;
		width: 600px;
		background-color: #E3E3E3;
		
	}
	
	form{
		padding: 50px;
	}
	
	.error{
		color: red;
	}
	
	#success{
		color: green;
	}
	
</style>	
	
</head>

<body>
	<div id="container">
		
	
		<form action="week2_object_email.php" method="post">
			<h2>Contact Form</h2>
			<div class="error"><?php echo $errFName ?></div>
			<p>First Name: <input type="text" name="fName" value="<?php echo $fName ?>"></p>

			<div class="error"><?php echo $errLName ?></div>
			<p>Last Name: <input type="text" name="lName" value="<?php echo $lName ?>"></p>

			<div class="error"><?php echo $errDOB ?></div>
			<p>Date of Birth: <input type="text" name="dateOfBirth" placeholder="mm/dd/yyyy" value="<?php echo $dateOfBirth ?>"></p>

			<div class="error"><?php echo $errEmail ?></div>
			<p>Contact Email Address: <input type="text" name="senderEmail" value="<?php echo $senderEmail ?>"></p>

			<div class="error"><?php echo $errMessage ?></div>
			<p>Message: <textarea name="contactMessage" rows="4" cols="50"><?php echo $messageField ?></textarea></p>

			<input type="submit" id="button" name="emailSubmit" value="Submit">

			<p id="success"><?php echo $emailSuccess ?></p>
		</form>
		
	</div>
</body>
</html>