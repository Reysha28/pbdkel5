<?php
    $hostname="localhost";
    $username="postgres";
    $password="1234567";
    $dbname="dbtatitatu";  

    $conn = pg_connect("host=$hostname dbname=$dbname user=$username password=$password");
    
    if(!$conn)
    {
		die("Error: Failed to connect to database!");
	}

    ?>