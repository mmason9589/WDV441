<!doctype html>
<?php

require_once("../inc/NewsArticles.class.php");

$newsArticle = new NewsArticles();

//$listOfArticles = $newsArticle->getList('articleList');

$articleList = $newsArticle->getListFiltered(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

?>
<html>
<head>
<meta charset="UTF-8">
<title>List Page - Articles</title>
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
	
	<h3><u>Create a new Article</u></h3>
	
	<button onClick="document.location='article-edit.php'">Create</button><br><br><br>
	
	<h3><u>List of Articles</u></h3>
	
	<div style="margin-bottom: 15px">
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
			Search: 
			<select name="filterColumn">
				<option value="articleTitle">Article Title</option>
				<option value="articleAuthor">Article Author</option>
				<option value="articleDate">Article Date</option>
				<option value="articleContent">Article Content</option>                    
			</select>
			&nbsp;<input type="text" name="filterText"/>
			&nbsp;<input type="submit" name="filter" value="Search"/>
			&nbsp;<input onClick="document.location='listPage.php'" type="reset" name="reset" value="Clear"/>
		</form>
	</div>
	
	
	<table style="width: 50%">
		<tr>
			<th>Article Title&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=DESC">D</a></th>
			<th>Article Author&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=DESC">D</a></th>
			<th>Article Date&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleDate&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=DESC">D</a></th> 
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php 
			foreach($articleList as $articleData) {

			//var_dump($x_value);
		?> 

			<tr>
				<td><?php echo $articleData['articleTitle']; ?></td>
				<td><?php echo $articleData['articleAuthor']; ?></td>
				<td><?php echo $articleData['articleDate']; ?></td>
				<td><button onClick="document.location='article-view.php<?php echo "?articleID=" . $articleData['articleID'] ?>'">View</button></td>
				<td><button onClick="document.location='article-edit.php<?php echo "?articleID=" . $articleData['articleID'] ?>'">Edit</button></td>
			</tr>
		
		<?php 
			}
		?> 
	</table>
</body>
</html>