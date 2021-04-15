<?php
require_once("../inc/users.class.php");

$user = new Users();

$userArray = array();

// load the user if we have it
if (isset($_REQUEST['userid']) && $_REQUEST['userid'] > 0) {
    $user->loadREST($_REQUEST['userid']);
    $userArray = $user->userData;
}

echo json_encode($userArray);

?>
