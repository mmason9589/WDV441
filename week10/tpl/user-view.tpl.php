<html>
    <body>
        username: <?php echo (isset($userArray['username']) ? $userArray['username'] : ''); ?><br>
        userlevel: <?php echo (isset($userArray['userlevel']) ? $userArray['userlevel'] : ''); ?><br>
		
        <?php if (is_file(dirname(__FILE__) . "/../public/images/" . $userArray['userid'] . "_user.jpg")) { ?>
            <img style="height:200px" src="images/<?php echo $userArray['userid'] . "_user.jpg"; ?>"/>
        <?php } ?>  

		<p><button onClick="document.location='user-list.php'">Return</button></p>
    </body>
</html>