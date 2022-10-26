<?php
require_once 'db.php';

if(isset($_POST['username'], $_POST['pass'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
}
else
    die('Please provide username and password!');

if(isset($_POST['email']))
    $email = $_POST['email'];

/* Check if specified username exists in the database */
$query = "SELECT username FROM user WHERE username=:user";
$row_count = get_row_count($query, ['user' => $username]);

if($row_count > 0) {
    echo 'Reserved username';
    exit(1);
}

/* Check if specified email exists in the database */
if(isset($email)) {
    $query = "SELECT username FROM user WHERE email=:email";
    $num_rows = get_row_count($query, ['email' => $email]);
    if($num_rows > 0) {
        echo 'Reserved email';
        exit(1);
    }
}
?>
