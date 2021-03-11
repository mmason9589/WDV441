<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

/*
// testing the search
$articleList = $newsArticle->getList(
    "articleID",
    "DESC",
    "articleTitle",
    "Article"
);

var_dump($articleList);die;
*/

$articleList = $newsArticle->getListFiltered(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

//var_dump($articleList);

?>
<html>
    <body>
        <div>News Articles - <a href="/Week06/public/article-edit.php">Add New Article</a></div>        
        <div>
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
            </form>
        </div>
		<div>
            <table border="1">
                <tr>
                    <th>Article Title&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=DESC">D</a></th>
                    <th>Article Author&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=DESC">D</a></th>
                    <th>Article Date&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleDate&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=DESC">D</a></th> 
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($articleList as $articleData) 
                { ?>
                    <tr>
                        <td><?php echo $articleData['articleTitle']; ?></td>                
                        <td><?php echo $articleData['articleAuthor']; ?></td>                
                        <td><?php echo $articleData['articleDate']; ?></td>
                        <td><a href="/Week06/public/article-edit.php?articleID=<?php echo $articleData['articleID']; ?>">Edit</a></td>
                        <td><a href="/Week06/public/article-view.php?articleID=<?php echo $articleData['articleID']; ?>">View</a></td>
                            
                    </tr>
                <?php } ?>                
            </table>
        </div>
    </body>
</html>