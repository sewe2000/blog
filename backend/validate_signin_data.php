<?php
require_once "sql_credentials.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['username'], $_POST['pass'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
}
else
    die('Please provide username and password!');

if(isset($_POST['email']))
    $email = $_POST['email'];
$connection = mysqli_connect($host, $user, $password, $db_name);
if($connection->connect_error) {
    die("Couldn't connect with the database. Error: ".$connection->connect_errno);
}

/* Check if specified username exists in the database */
$username = mysqli_real_escape_string($connection, $username);
$query = "SELECT username FROM user WHERE username='{$username}'";
$result = $connection->query($query);
if($result->num_rows > 0) {
    echo 'Reserved username';
    exit(1);
}

/* Check if specified email exists in the database */
if(isset($email)) {
    $email = mysqli_real_escape_string($connection, $email);
    $query = "SELECT username FROM user WHERE email='{$email}'";
    $result = $connection->query($query);
    if($result->num_rows > 0) {
        echo 'Reserved email';
        exit(1);
    }
}
?>
