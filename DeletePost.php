<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "jiachengchen", "eKi9ij4e", "jiachengchen");
	if(!empty($_POST['postsToDelete']))
	{

        if ($mysqli->connect_errno) 
        {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}

		foreach($_POST['postsToDelete'] as $post)
		{
			$query = 'DELETE FROM Posts WHERE post_id="' . $post . '";';

			if($result = $mysqli->query($query))
			{
				echo "Post with ID " . $post . " successfully deleted";
					$result->free();
			}
            else 
            {
				echo "Post with ID " . $post . " deletion unsuccessful";
			}
		}
	}
	else
		echo "Please choose at least 1 post to delete";

	$mysqli->close();
?>