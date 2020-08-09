<?php
	$conn = new PDO('sqlite:db/db');
 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = "CREATE TABLE IF NOT EXISTS contacts ( id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE, source_id INTEGER, name TEXT, phone INTEGER, email TEXT )";

	$conn->exec($query);
?>