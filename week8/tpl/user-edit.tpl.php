<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
            <?php if (isset($userErrorsArray['username']) || isset($userErrorsArray['password'])){ ?>
                <div style="color: red"><?php echo $userErrorsArray['username']; echo $userErrorsArray['password'] ; ?>
					<?php } ?></div>
            username: <input type="text" name="username" value="<?php echo (isset($userArray['username']) ? $userArray['username'] : ''); ?>"/><br>
			password: <input type="text" name="password" value=""/><br>
			userlevel: <select name="userlevel" id="userlevel">
							<option <?php if($userArray['userlevel'] == "100") { ?> selected <?php } ?> value="100">Guest</option>
							<option <?php if($userArray['userlevel'] == "200") { ?> selected <?php } ?> value="200">User</option>
							<option <?php if($userArray['userlevel'] == "300") { ?> selected <?php } ?> value="300">Admin</option>
					   </select><br>
            User Image: <input type="file" name="upload_image"/><br>	
					
            <input type="hidden" name="userid" value="<?php echo (isset($userArray['userid']) ? $userArray['userid'] : ''); ?>"/>
            <input onClick="document.location='user-save-success.php'" type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>      
		<br>	
		<p><button onClick="document.location='user-list.php'">Return</button></p>
    </body>
</html>