<html>
<head>
<meta charset="UTF-8">
<title>User Login</title>
</head>

<body>
	
	<h3>Please Login</h3>
	
	<?php echo $message; ?>
	
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
	
		username: <input type="text" name="username" /><br>
		password: <input type="text" name="password" /><br>
		
		<br>

		<input type="submit" name="Login" value="Login"/>
		<input onClick="document.location='user-logout'" type="submit" name="Cancel" value="Cancel"/>            
	</form>
</body>
</html>