<?php
 
// class to handle interaction with the newsuserids table
class Users {
	
    // property to hold our data from our userid
    var $userData = array();
    // property to hold errors
    var $errors = array();
    // property for holding a reference to a database connection so we can reuse it
    var $db = null;

    function __construct() {
        // create a connection to our database
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2021;charset=utf8', 
            'root', 'root');           
    }
    
    // takes a keyed array and sets our internal data representation to the array
    function set($dataArray) {
        $this->userData = $dataArray;
        
        //var_dump($this->userData, "test");
    }

    // santize the data in the passed array, return the array
    function sanitize($dataArray) {
        // sanitize data based on rules
        
        return $dataArray;
    }
    
    // load a news userid based on an id
    function load($userid) {
        // flag to track if the userid was loaded
        $isLoaded = false;

        // load from database
        // create a prepared statement (secure programming)
        $stmt = $this->db->prepare("SELECT * FROM users WHERE userid = ?");
        
        // execute the prepared statement passing in the id of the userid we 
        // want to load
        $stmt->execute(array($userid));

        // check to see if we loaded the userid
        if ($stmt->rowCount() == 1) {
            // if we did load the userid, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            
            // set the data to our internal property            
            $this->set($dataArray);
                        
            // set the success flag to true
            $isLoaded = true;
        }
        
        //var_dump($stmt->rowCount());
        
        // return success or failure
        return $isLoaded;
    }

    //load user data excluding password
    function loadREST($userid) {
        // flag to track if the userid was loaded
        $isLoaded = false;

        // load from database
        // create a prepared statement (secure programming)
        $stmt = $this->db->prepare("SELECT userid, username, userlevel FROM users WHERE userid = ?");
        
        // execute the prepared statement passing in the id of the userid we 
        // want to load
        $stmt->execute(array($userid));

        // check to see if we loaded the userid
        if ($stmt->rowCount() == 1) {
            // if we did load the userid, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            
            // set the data to our internal property            
            $this->set($dataArray);
                        
            // set the success flag to true
            $isLoaded = true;
        }
        
        //var_dump($stmt->rowCount());
        
        // return success or failure
        return $isLoaded;
    }
    
    // save a news userid (inserts and updates)
    function save() {
        // create a flag to track if the save was successful
        $isSaved = false;
        
        // determine if insert or update based on useridID
        // save data from userData property to database
        if (empty($this->userData['userid'])) {
            // create a prepared statement to insert data into the table
			
			
            $stmt = $this->db->prepare(
                "INSERT INTO users 
                    (username, password, userlevel) 
                 VALUES (?, ?, ?)");
			
			//hash password
			
			$hash = $this->hashPassword($this->userData['password']);
			
			$this->userData['password'] = $hash;
			
            // execute the insert statement, passing in the data to insert
            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                    $this->userData['userlevel']
                )
            );
            
            // if the execute returned true, then store the new id back into our 
            // data property
            if ($isSaved) {
                $this->userData['userid'] = $this->db->lastInsertId();
            }
        } else { 
			// if this is an update of an existing record, create a prepared update 
			// statement
			
			
            $stmt = $this->db->prepare(
                "UPDATE users SET 
                    username = ?,
                    password = ?,
                    userlevel = ?
                 WHERE userid = ?"
            );
			
			$hash = $this->hashPassword($this->userData['password']);
			
			$this->userData['password'] = $hash;
                    
            // execute the update statement, passing in the data to update
            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                    $this->userData['userlevel'],
                    $this->userData['userid']
                )
            ); 
        }
                        
        // return the success flage
        return $isSaved;
    }
    
    // validate the data we have stored in the data property
    function validate() {
        // flag as true initially
        $isValid = true;
        
        // if an error, store to errors using column name as key
        
        // validate the data elements in userid property
		// validate username
        
        if (empty($this->userData['username']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['username'] = "Please enter a username <br><br>";
            $isValid = false;
        }
		
		// validate password
        if (empty($this->userData['password']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['password'] = "Please enter a password <br><br>";
            $isValid = false;

        }
        
		
		// validate userlevel
        if (empty($this->userData['userlevel']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['userlevel'] = "Please enter a user level <br><br>";
            $isValid = false;
        }
                        
        // return valid t/f
        return $isValid;
    }
	
	function validateUsername($inUsername, $inUserID){
		
		$isValid = null;

		// build the SQL to check for the user
		$userCheckSQL = "SELECT username FROM users
		WHERE username = ?";
		
		$stmt = $this->db->prepare($userCheckSQL);

        // execute the prepared statement
        $stmt->execute(array($inUsername));

        //name and id check for if the user doesn't want to change their username, then...
        //...don't make them change username
        $userANDidCheck = "SELECT userid, username FROM users
        WHERE userid = ? AND username = ?";

        $stmt2 = $this->db->prepare($userANDidCheck);
        
        $stmt2->execute(array($inUserID, $inUsername));
			
		if ($stmt->rowCount() == 0 || $stmt2->rowCount() == 1){
			$isValid = true;
		}
		else{
			$this->errors['username'] = "Username already taken <br><br>";
		}
		
		return $isValid;
	}
		
	
    // get a list of news userids as an array
    function getList() {
        $usersList = array();

        // get the news userids and store into $usersList
		// create a prepared statement
		$stmt = $this->db->prepare("SELECT * FROM users");
		
		//execute
		$stmt->execute();
		
		// fetch the data as a keyed array
        $usersList = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
        // return the list of users
        return $usersList;        
    }
	
	function getListFiltered(
        $sortColumn = null, 
        $sortDirection = null, 
        $filterColumn = null, 
        $filterText = null,
        $page = null
        
        ) {

		$usersList = array();

		$sql = "SELECT * FROM users ";


		if (!is_null($filterColumn) && !is_null($filterText)) {
			//$sql .= " WHERE " . $filterColumn . " LIKE '%?%'";
			$sql .= " WHERE " . $filterColumn . " LIKE ?";
		}

		if (!is_null($sortColumn)) {
			$sql .= " ORDER BY " . $sortColumn;

			if (!is_null($sortDirection)) {
				$sql .= " " . $sortDirection;
			}
		}

        // setup paging if passed
		if (!is_null($page)) {
			$sql .= " LIMIT " . ((2 * $page) - 2) . ",2";
		}

		$stmt = $this->db->prepare($sql);

		if ($stmt) {
			$stmt->execute(array('%' . $filterText . '%'));

			$usersList = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $usersList;        
    } 

    //get filtered list exclusing password
    function getListFilteredREST(
        $sortColumn = null, 
        $sortDirection = null, 
        $filterColumn = null, 
        $filterText = null,
        $page = null
        
        ) {

		$usersList = array();

		$sql = "SELECT userid, username, userlevel FROM users ";


		if (!is_null($filterColumn) && !is_null($filterText)) {
			//$sql .= " WHERE " . $filterColumn . " LIKE '%?%'";
			$sql .= " WHERE " . $filterColumn . " LIKE ?";
		}

		if (!is_null($sortColumn)) {
			$sql .= " ORDER BY " . $sortColumn;

			if (!is_null($sortDirection)) {
				$sql .= " " . $sortDirection;
			}
		}

        // setup paging if passed
		if (!is_null($page)) {
			$sql .= " LIMIT " . ((2 * $page) - 2) . ",2";
		}

		$stmt = $this->db->prepare($sql);

		if ($stmt) {
			$stmt->execute(array('%' . $filterText . '%'));

			$usersList = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $usersList;        
    } 
	
	
	
	// hash the passed in password and return the hash
    function hashPassword($passwordToHash) {
        
		$passwordHash = hash("sha256", $passwordToHash);
		
		//var_dump($passwordHash);
        return $passwordHash;
    }
	
	
	
	function userLogin($username, $inPassword) {
        $userid = null;
        
        $password = $this->hashPassword($inPassword);
        
        // build the SQL to check for the user
        $userCheckSQL = "SELECT userid, userlevel FROM users
             WHERE username = ? AND password = ?";
        
        $stmt = $this->db->prepare($userCheckSQL);
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($username, $password));
        
        if ($stmt->rowCount() == 1) 
        {
            // if we did load the user, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $userid = $dataArray['userid'];
			$userlevel = $dataArray['userlevel'];
			
			$_SESSION["validUser"] = "yes";
			$_SESSION["userid"] = $userid;
			$_SESSION["userlevel"] = $userlevel;
			
        }
		else{
			$_SESSION["validUser"] = "no";
			$_SESSION["userid"] = '';
		}
        
        return $userid;
    }


    function saveImage($fileArray) {

        move_uploaded_file($fileArray['tmp_name'], dirname(__FILE__) . 
        "/../public/images/" . $this->userData['userid'] . "_user.jpg");
	
	
    }

}