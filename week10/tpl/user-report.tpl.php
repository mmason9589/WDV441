<html>
<head>

<style>
	

	table, th, td {
 		border: 1px solid black;
  		border-collapse: collapse;
		text-align: center;
		padding: 5px;
	}
	
</style>
</head>
    <body>
        <?php if($_SESSION['userlevel'] == "300") { ?>

            <div>Users Report</div>        
            <div>
                <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                    Filter: 
                    <select name="filterColumn">
                        <option value="username">Username</option>
                        <option value="userlevel">User level</option>              
                    </select>
                    &nbsp;<input type="text" name="filterText"/>
                    &nbsp;<input type="submit" name="btnViewReport" value="View Report"/>&nbsp;
                    <input onClick="document.location='user-report.php'" type="reset" name="reset" value="Clear"/>
                </form>
            </div>
            <?php if (count($usersList) > 0) { ?>
            <div>
                <a href="<?= $_SERVER['SCRIPT_NAME']; ?>?download=1&<?= $_SERVER["QUERY_STRING"]; ?>">Download Report</a><br><br>
                <table style="width:50%">
                    <tr>
                        <th>Username&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; echo '?' . $_SERVER["QUERY_STRING"]; ?>&sortColumn=username&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; echo '?' . $_SERVER["QUERY_STRING"]; ?>&sortColumn=username&sortDirection=DESC">D</a></th>
                        <th>User level&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; echo '?' . $_SERVER["QUERY_STRING"];?>&sortColumn=userlevel&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; echo '?' . $_SERVER["QUERY_STRING"];?>&sortColumn=userlevel&sortDirection=DESC">D</a></th>
                        <th>User ID&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; echo '?' . $_SERVER["QUERY_STRING"];?>&sortColumn=userid&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; echo '?' . $_SERVER["QUERY_STRING"];?>&sortColumn=userid&sortDirection=DESC">D</a></th> 
                    </tr>
                    <?php foreach ($usersList as $userData) { ?>
                        <tr>
                            <td><?php echo $userData['username']; ?></td>                
                            <td><?php echo $userData['userlevel']; ?></td>                
                            <td><?php echo $userData['userid']; ?></td>                            
                        </tr>
                    <?php  } ?>                
                </table>

                <a id="previous" href="<?= $_SERVER['SCRIPT_NAME']; ?>?<?= $previousPageLink; ?>">Previous Page</a>
                
                <a id="next" href="<?= $_SERVER['SCRIPT_NAME']; ?>?<?= $nextPageLink; ?>">Next Page</a>
            </div>
            <?php } ?>
        <?php }else{ echo $_SESSION['userlevel']; ?>
            <h1>Please log in as Admin to view reports.</h1>
        <?php } ?>

        <p><button onClick="document.location='user-list.php'">Return</button></p>
    </body>
</html>