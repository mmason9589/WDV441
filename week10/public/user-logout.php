 <?php   
 //logout.php  
 session_start(); 

 session_unset();	 //remove all session variables related to current session
 session_destroy();  //remove current session
 header("location:user-list.php");  

 ?> 