<!doctype html>
<?php

require_once("../inc/NewsArticles.class.php");

$newsArticle = new NewsArticles();

$listOfArticles = $newsArticle->getList('articleList');

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
	
	
	<table style="width: 50%">
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th>Date</th>
			<th>View</th>
			<th>Edit</th>
		</tr>
		<?php 
			foreach($listOfArticles as $x_value) {

			//var_dump($x_value);
		?> 

			<tr>
				<td><?php echo $x_value['articleTitle']; ?></td>
				<td><?php echo $x_value['articleAuthor']; ?></td>
				<td><?php echo $x_value['articleDate']; ?></td>
				<td><button onClick="document.location='article-view.php<?php echo "?articleID=" . $x_value['articleID'] ?>'">View</button></td>
				<td><button onClick="document.location='article-edit.php<?php echo "?articleID=" . $x_value['articleID'] ?>'">Edit</button></td>
			</tr>
		
		<?php 
			}
		?> 
	</table>
</body>
</html>