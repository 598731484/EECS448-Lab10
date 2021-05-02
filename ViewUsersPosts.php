<?php
    echo "<table><body><html>";
    $mysqli = new mysqli("mysql.eecs.ku.edu", "jiachengchen", "eKi9ij4e", "jiachengchen");
	$uName = $_POST["uname"];

    if ($mysqli->connect_errno) 
    {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	
	echo "<tr><th>User " . $uName . "</th></tr>";
	
	$query = 'SELECT Content FROM posts WHERE Author_ID="' . $uName . '";';

	if($result = $mysqli->query($query))
	{
        while ($row = $result->fetch_assoc()) 
        {
			echo "<tr><td>" . $row["content"] . "</td></tr>";
		}

	    $result->free();
	}
    $mysqli->close();
    
    echo "</table></body></html>";
?>