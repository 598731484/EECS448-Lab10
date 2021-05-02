<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "jiachengchen", "eKi9ij4e", "jiachengchen");
	$Name = $_POST["uname"];
	$duplicateFlag = false;

    if ($mysqli->connect_errno) 
    {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}

	if($Name == "")
	{
		echo "Username can not be blank";
	}
	else
	{
		$query = "SELECT user_id FROM Users";

        if ($result = $mysqli->query($query)) 
        {
            while ($row = $result->fetch_assoc()) 
            {
			if($row["user_id"]==$Name)
			{
				$duplicateFlag = true;
			}
		    }
		    $result->free();
		}
		
		if($duplicateFlag)
		{
			echo "The user already exists";
		}
		else
		{
			$query = "INSERT INTO Users VALUES('" . $Name . "');";

			if($result = $mysqli->query($query))
				echo "User successfully created";
			else
				echo "User unsuccessfully created";
		}
	}

	$mysqli->close();
?>