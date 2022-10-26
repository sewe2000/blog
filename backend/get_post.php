<?php

require_once 'db.php';

$query = "SELECT html FROM post WHERE html_filename=:filename";
$result = fetch_results($query, ['filename' => $filename]);

if(count($result) > 0) {
    echo $result[0]['html'];
} else {
	die("Could not load blog page!");
}
?>
