<?php
	//database connection details
	$host = 'localhost';//Create variable for location for host location
	$user = 'root';//Create variable for user
	$password = '';//Create variable for password
	$database = 'personalityquiz';//Create variable for database name

	//connect to database with a try/catch statement
	//if the connection is not successful display the error message via database_error.php
	//the PDOException class represents the error raised by PDO
	//the PDO error is stored in the variable $e
	//the PDO error is returned as a string via the getMessage() function
	try
	{
        /*
        Try to connect to PDO Object  Using Host location w ith database name using, username
        and password
        */
		$conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
	}
	catch(PDOException $e)//Throw an Error if connecting to database fails.
	{
		$error_message = $e->getMessage();//Store & get messages from PDO exception
		echo $error_message;
        //include('../view/database_error.php');//Include Error php page handler
		exit();
	}
?>