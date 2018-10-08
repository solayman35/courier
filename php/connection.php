<?php

	$servername = "localhost";	
	$username = "root";
	$password = "";
	$db_name = "courier";
	$conn = new mysqli($servername, $username, $password, $db_name);
	$conn->query("SET CHARACTER SET utf8");
	$conn->query("SET SESSION collation_connection ='utf8_general_ci'");

   	if($conn->connect_error) { 
    	die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }

