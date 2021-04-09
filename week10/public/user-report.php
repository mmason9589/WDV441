<?php
require_once('../inc/users.class.php');

session_start();

// create an instance of the news article class
$users = new Users();

$usersList = array();

$rowCount = array();

// download report
if (isset($_GET['download']) && $_GET['download'] == "1") {
	
	// echo the data
	$usersList = $users->getListFiltered(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null),
		null
	);
	//var_dump($usersList);die;	
	
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . date("YmdHis") . '_users_report.csv"');
	
	foreach ($usersList as $rowData) {
			
				echo '"' . $rowData['userid'] . '",';
				echo '"' . $rowData['username'] . '",';
				echo '"' . $rowData['userlevel'] . '"';
				echo "\r\n";
			
		}
	
	
	exit;
}

// check to see if button was click
if (isset($_GET['btnViewReport'])) {
	
    // run report
	$usersList = $users->getListFiltered(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null),
		(isset($_GET['page']) ? $_GET['page'] : 1)
	);

	//get the total number of items in the array before applying pagination
	$rowCount = $users->getListFiltered(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null)
	);

	$rows = count($rowCount);

}

$_GET['page'] = (isset($_GET['page']) ? $_GET['page'] + 1 : 2);
$nextPageLink = http_build_query($_GET);


$_GET['page'] = (isset($_GET['page']) ? $_GET['page'] - 2 : 2);
$previousPageLink = http_build_query($_GET);

//disables the previous button when on the first page
if($_GET['page'] == NULL){
	echo "<style>#previous{display:none;}</style>";
}

//disable the next button when on the last page
//$rows divided by how many rows are selected to be shown
//minus 1 to remove the next button on the exact last page
if(($rows / 2) - 1 <= $_GET['page']){
	echo "<style>#next{display:none;}</style>";
}


include('../tpl/user-report.tpl.php');
?>