<?php 
require_once('../inc/users.class.php');

// create an instance of our class so we can use it
$user = new Users();

// initialize some variables to be used by our view
$userArray = array();
$userErrorsArray = array();

// load the user if we have it
if (isset($_REQUEST['userid']) && $_REQUEST['userid'] > 0) {
    $user->load($_REQUEST['userid']);
    // set our user array to our local variable
    $userArray = $user->userData;
}

//if cancel is clicked, send back to list page
if (isset($_POST['Cancel'])) {
	header('location: user-list.php');
	exit;
}

// apply the data if we have new data
if (isset($_POST['Save'])) {
    // sanitize and set the post array to our local variable
    $userArray = $user->sanitize($_POST);
    // pass the array into our instance
    $user->set($userArray);
    
    // validate
    if ($user->validate() && $user->validateUsername($userArray['username'], $userArray['userid'])) {
        // save
        if ($user->save()) {

            $user->saveImage($_FILES['upload_image']);

            header("location: user-save-success.php");
            exit;
        } else {
            $userErrorsArray[] = "Save failed";
            var_dump($userErrorsArray);
        }
    } else {
        $userErrorsArray = $user->errors;
        $userArray = $user->userData;
    }
}


require_once('../tpl/user-edit.tpl.php');
?>
