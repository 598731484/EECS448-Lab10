<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "jiachengchen", "eKi9ij4e", "jiachengchen");
    $author = $_POST["author"];
    $textpost = $_POST["textpost"];

    if ($mysqli->connect_errno) 
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    
    $query = "SELECT * FROM Posts";
    if ($result = $mysqli->query($query))
        $row_count = $result->num_rows + 1;

    $query = "SELECT user_id FROM Users WHERE user_id='$author'";
    
    if($textpost == "")
    {
        echo "Empty posts are not allowed."; 
    }
    else if ($result = $mysqli->query($query)) 
    {
        if(empty($result->fetch_all()))
        {
            echo "User does not exist. Use existing user or create new.";
        }
        else
        {
            $query = "INSERT INTO Posts(post_id, content, author_id) VALUES('$row_count','$textpost','$author')";
            if($result = $mysqli->query($query))
                echo "Post created.";
        }
            
    }
    $mysqli->close();
?>