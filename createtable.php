<?php

include_once (__DIR__.'/classes/taskmodel.php');

// Assumes database already exists.
$conn = connect();
$sql1 = "CREATE TABLE shows(
			showId INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(showId),
			name VARCHAR(30),
			link TEXT,
			country VARCHAR(10),
            started INT,
            ended INT,
            seasons INT,
            status VARCHAR(30),
            classification VARCHAR(100),
            genres TEXT)";

$sql2 = "CREATE TABLE episodes(
			id INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(id),
            showId INT,
			name VARCHAR(30),
			totalseasons INT,
            epnum INT,
            seasonnum INT,
            prodnum INT,
            start DATE,
            link TEXT,
            title TEXT)";

try{
	$conn->query($sql1);
    $conn->query($sql2);
}
catch(Exception $e){
	print_r($e);
}

echo "<h3>Table created.</h3>";
?>