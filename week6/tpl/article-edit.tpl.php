<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($articleErrorsArray['articleTitle'])) { ?>
                <div><?php echo $articleErrorsArray['articleTitle']; ?>
            <?php } ?>
            title: <input type="text" name="articleTitle" value="<?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?>"/><br>
            content: <textarea name="articleContent"><?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?></textarea><br>
            author: <input type="text" name="articleAuthor" value="<?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?>"/><br>
            date: <input type="text" name="articleDate" value="<?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?>"/><br>
            <input type="hidden" name="articleID" value="<?php echo (isset($articleDataArray['articleID']) ? $articleDataArray['articleID'] : ''); ?>"/>
            <input onClick="document.location='article-save-success.php'" type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>      
		<br>	
		<p><button onClick="document.location='listPage.php'">Return</button></p>
    </body>
</html>