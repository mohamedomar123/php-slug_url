<?php

	ob_start();
    session_start();
    session_regenerate_id();
	
	// include db connection file
	include 'db/connect.php';
	
	// Check If Get Request Itemid Is Numeric & Get The Integet Valu Of It
	$postid = isset($_GET['post_id']) && is_numeric($_GET['post_id']) ? intval($_GET['post_id']) : 0;

	// Select All Data Depend On This Id
	$stmt = $con->prepare("SELECT * FROM items WHERE Item_ID = ?");

	// Execute Query
	$stmt->execute(array($postid));

	// Fetch The Data
	$post = $stmt->fetch();
    
?>

<!doctype html>
<html>
    
    <head>

        <title><?php echo $post['Name']; ?></title>
        
    </head>
    
    <body>
        
        <?php
            if (! empty($post['Content'])) {
                echo $post['Content'];
            }
        ?>
        
    </body>
    
</html>

<?php
    
    ob_end_flush();
    
?>
