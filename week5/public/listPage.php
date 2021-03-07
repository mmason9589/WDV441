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
</head>

<body>
	
	<h3><u>Create a new Article</u></h3>
	
	<button onClick="document.location='article-edit.php'">Create</button><br><br><br>
	
	<h3><u>List of Articles</u></h3>
	
	<?php 
		foreach($listOfArticles as $x_value) {
		
		//var_dump($x_value);
	?> 
	
	<p>
		Title: <?php echo $x_value['articleTitle']; ?><br>
		Author: <?php echo $x_value['articleAuthor']; ?><br>
		Content: <?php echo $x_value['articleContent']; ?><br>
		Date: <?php echo $x_value['articleDate']; ?>
	</p>
	
	<p>
		<button onClick="document.location='article-view.php<?php echo "?articleID=" . $x_value['articleID'] ?>'">View</button>
		
		<button onClick="document.location='article-edit.php<?php echo "?articleID=" . $x_value['articleID'] ?>'">Edit</button>
	
	</p><br>
	
	<?php 
		}
	?> 
	
</body>
</html>