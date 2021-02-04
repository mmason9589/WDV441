<?php
// load our data
$firstName = "Garritt";

// determine if admin
$isAdmin = ($firstName == "Garritt" ? true : false);

if ($firstName == "Garritt") { 
	$isAdmin = true;
} else {
	$isAdmin = false;
}

// show our data
?>
<html>
    <body>
		
        <?php if ($isAdmin) { ?>
            <p style="">ADMIN!!!</p>
        <?php } ?>
        
        <?php $firstName = "Garritt"; // this is a no-no ?>
        Hello <? echo $firstName; ?>!
    </body>    
</html>