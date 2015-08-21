<?php
	//This is a file for testing mysql connection
	require("./sql.php");
	$db = new mysqli($host, $user, $pass, $dbname);
	if($db->connect_errno > 0){
		die('Unable to connect to database. ' . $db->connect_error );
	}
	$db->set_charset("utf8");
	echo "connected!";
	$db->close();
?>