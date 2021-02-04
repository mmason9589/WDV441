<!doctype html>
<?php

	//array of names
	$names = array("Matt", "Mike", "Steve", "Cody", "Bob", "Tori", "Maggie", "Sandy", "Derek", "Pat");

	//store random number
	$num = mt_rand(0,20);

	//echo the random number
	echo "Random number is: " . $num . "<br>";

	//loop to echo name if $num is between 0 and 9, or echo all names if greater than 9
	if($num <= 9){
		echo "Hello " . $names[$num];
	}else{
		foreach($names as $value){
			echo $value . "<br>";
		}
	}

?>
<html>
    <body>
		
    </body>    
</html>