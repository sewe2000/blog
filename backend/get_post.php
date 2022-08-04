<?php

require "sql_credentials.php";

$connection = mysqli_connect($hostname, $user, $password, $db_name);
if($connection->connect_error) {
	die("Connection failed: ".$connection->connect_error);
}

$query = "SELECT html FROM post WHERE html_filename='".$filename."'";
$result = $connection->query($query);

if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	echo $row['html'];
} else {
	die("Could not load blog page!");
}

$connection->close();

?>
