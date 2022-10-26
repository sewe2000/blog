<?php

require_once 'db.php';
session_start();

if(isset($_POST['username'], $_POST['pass'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
} else {
    die('Please provide username AND password!');
}

$query = "SELECT username FROM user WHERE username=:user AND password=SHA2(:pass, 256)";
$row_count = get_row_count($query, ['user' => $username, 'pass' => $pass]);

if($row_count > 0) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    header("Location: ../index.php");
} else {
    $query = "SELECT username FROM user WHERE username=:user";
    $row_count = get_row_count($query, ['user' => $username]);
    if($row_count === 0)
        die("Invalid username");
    else
       die("Invalid password");
}

?>
