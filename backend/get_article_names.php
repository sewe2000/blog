<?php
require "sql_credentials.php";

$link = mysqli_connect($host, $user, $password, $db_name);

if($link->connect_error) {
	die('Jest kiepsko!');
	exit();
}

$query = 'SELECT title, posting_date, html_filename FROM post ORDER BY posting_date DESC';
$result = $link->query($query);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo '<li><strong><a href="src/'.$row["html_filename"].'">'.$row["title"].'</a></strong> Opublikowano: '.$row["posting_date"].'</li>';
	}
}


$link->close();
?>
