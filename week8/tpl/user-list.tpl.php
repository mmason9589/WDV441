<html>
<head>
<meta charset="UTF-8">
<title>List Page - Users</title>
<style>
	
	.column {
	  box-sizing: border-box;
	  float: left;
	  width:15%;
	  padding: 10px;
	}

	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	table, th, td {
 		border: 1px solid black;
  		border-collapse: collapse;
		text-align: center;
		padding: 5px;
	}
	
</style>	
	
</head>

<body>
	
	<div class="row">
		<div class="column" >
			<h3><u>Create a new user</u></h3>
			<button onClick="document.location='user-edit.php'">Create</button>
		</div>
			
		<div class="column">
			<h3><u>Login</u></h3>
			<?php if(empty($_SESSION['userid'])) {?>
				<button onClick="document.location='user-login.php'">Login</button>
			<?php } ?>
			<?php if($_SESSION['validUser'] == 'yes') {?>
				<button onClick="document.location='user-home.php'">Profile</button>
				<button onClick="document.location='user-logout.php'">Logout</button>
			<?php } ?>
		</div>	
			
	</div>	
	
	<br><br>
	
	<?php if($_SESSION['userlevel'] == "200" || $_SESSION['userlevel'] == "300") { ?>
	
		<h3><u>List of Users</u></h3>

		<div style="margin-bottom: 15px">
			<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
				Search: 
				<select name="filterColumn">
					<option value="username">Username</option>
					<option value="userlevel">Userlevel</option>                   
				</select>
				&nbsp;<input type="text" name="filterText"/>
				&nbsp;<input type="submit" name="filter" value="Search"/>
				&nbsp;<input onClick="document.location='user-list.php'" type="reset" name="reset" value="Clear"/>
			</form>
		</div>


		<table style="width: 50%">
			<tr>
				<th>Username&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=DESC">D</a></th>
				<th>Userlevel&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userlevel&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userlevel&sortDirection=DESC">D</a></th>
				<th>View</th>

				<?php if($_SESSION['userlevel'] == "300") { ?>
					<th>Edit</th>
				<?php } ?>

			</tr>

			

			<?php 
				foreach($usersList as $usersID) {
			?> 

				<tr>
					<td><?php echo $usersID['username']; ?></td>
					<td><?php echo $usersID['userlevel']; ?></td>
					<td><button onClick="document.location='user-view.php<?php echo "?userid=" . $usersID['userid'] ?>'">View</button></td>
					
					<?php if($_SESSION['userlevel'] == "300") { ?>
						<td><button onClick="document.location='user-edit.php<?php echo "?userid=" . $usersID['userid'] ?>'">Edit</button></td>
					<?php } ?>

				</tr>
			<?php 
				}
			
			?> 
		</table>
	
	<?php } else { ?>
		
		<h2>Login as User or Admin to view list of Users</h2>

		<h2>Login as Admin to view and edit Users</h2>
	
	<?php } ?>
</body>
</html>