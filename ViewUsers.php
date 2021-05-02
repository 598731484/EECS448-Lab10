<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jiachengchen", "eKi9ij4e", "jiachengchen");

if ($mysqli->connect_errno) 
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}
	
echo "<ul>";
	
$query = 'SELECT user_id FROM Users';

	if($result = $mysqli->query($query))
		{
			while ($row = $result->fetch_assoc()) 
			{
				echo "<li>" . $row["user_id"] . "</li>";
			}

        $result->free();
        }
    else
		echo "Cannot find";

	$mysqli->close();
?>