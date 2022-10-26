<?php
require_once 'db.php';

$query = 'SELECT title, posting_date, html_filename FROM post ORDER BY posting_date DESC';
$result = fetch_results($query);

if(count($result) > 0) {
    foreach($result as $value) {
		echo '<li><strong><a href="src/'.$value["html_filename"].'">'.$value["title"].'</a></strong> Opublikowano: '.$value["posting_date"].'</li>';
	}
}

?>
