<?php
	//require_once 'login.php';

	$txt = "[\"\"";
	$db_hostname = 'localhost';
	$db_database = 'actm';
	$db_username = 'root';
	$db_password = '';
	$connection = new mysqli($db_hostname,$db_username,$db_password,$db_database);
	$query = "SELECT name FROM schools";
	$result = $connection->query($query);

	if(!$result) die($connection->error);

	$rows = $result->num_rows;
	
	for($i = 0; $i < $rows; ++$i){
		$result->data_seek($i);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$txt .= ",\"".$returnText = $row['name']."\"";
		
		
	}
	$txt.="]";

	echo $txt;
	$result->close();
	$connection->close();


?>