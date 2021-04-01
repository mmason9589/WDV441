<!doctype html>
<?php

session_start();

require_once("../inc/users.class.php");

$user = new Users();

$usersList = $user->getListFiltered(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);


require_once("../tpl/user-list.tpl.php");
?>
