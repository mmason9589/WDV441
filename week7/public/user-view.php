<?php
require_once("../inc/users.class.php");

$user = new Users();

$userArray = array();

// load the user if we have it
if (isset($_REQUEST['userid']) && $_REQUEST['userid'] > 0) {
    $user->load($_REQUEST['userid']);
    $userArray = $user->userData;
}

require_once("../tpl/user-view.tpl.php");
?>
