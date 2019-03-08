<?php

	ob_start();
    session_start();
    session_regenerate_id();
	
	// include db connection file
	include 'db/connect.php';
    
?>

<!doctype html>
<html>
    
    <head>

        <title>All Posts</title>
        
    </head>
    
    <body>
						
        <h1>All Posts</h1>
        
        <?php
        $stmt = $con->prepare("SELECT * FROM posts");
        $stmt->execute();
		$allPosts = $stmt->fetchAll();

        foreach ($allPosts as $post) { ?>
        
            <h2> <a class="post-title" href="<?php echo 'post_content.php?post_id='. $post['Post_ID'] .''; ?>"> <?php echo $post['Name']; ?> </a> </h2>
        
        <?php
        }
        ?>
        
    </body>
    
</html>

<?php
    
    ob_end_flush();
    
?>