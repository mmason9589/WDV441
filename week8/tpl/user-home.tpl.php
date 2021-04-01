<html>
<head>
<meta charset="UTF-8">
<title>User Home Page</title>
</head>

<body>
	
	<?php if($_SESSION['validUser'] == "no" || $_SESSION['validUser'] == ""){ ?> 
	
		<h2>Please login to view content.</h2>
	
	<?php } ?>
	
	<?php if($_SESSION['validUser'] == "yes"){ ?> 
	
		<h2>Welcome!</h2>
	
		<p>Username: <?php echo $userArray['username'] ?></p>
	
		<p>Userlevel: <?php echo $userArray['userlevel'] ?></p>

		<p>
			<?php if (is_file(dirname(__FILE__) . "/../public/images/" . $userArray['userid'] . "_user.jpg")) { ?>
				<img style="height:200px" src="images/<?php echo $userArray['userid'] . "_user.jpg"; ?>"/>
			<?php } ?> 
		</p>
	
		<button onClick="document.location='user-list.php'">Return to Users</button>
		<button onClick="document.location='user-logout.php'">Log out</button>
	
	
	<?php } ?>
	
	
</body>
</html>