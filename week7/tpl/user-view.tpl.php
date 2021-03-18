<html>
    <body>
        username: <?php echo (isset($userArray['username']) ? $userArray['username'] : ''); ?><br>
        userlevel: <?php echo (isset($userArray['userlevel']) ? $userArray['userlevel'] : ''); ?><br>
		     
		<p><button onClick="document.location='user-list.php'">Return</button></p>
    </body>
</html>