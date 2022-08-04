<?php

require_once "sql_admin_credentials.php";
session_start();

if(isset($_POST['username'], $_POST['pass'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
} else {
    die('Please provide username AND password!');
}


$conn = mysqli_connect($host, $user, $password, $db_name);
if($conn->connect_error) {
    die("Couldn't connect to the database. Error: ".$conn->connect_errno);
}

$username_pure = mysqli_real_escape_string($conn, $username);
$pass_pure = mysqli_real_escape_string($conn, $pass);

$query = "SELECT username FROM user WHERE username='{$username_pure}' AND password=SHA2('{$pass_pure}', 256)";
$result = $conn->query($query);

if($result->num_rows > 0) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    header("Location: ../index.php");
} else {
    $query = "SELECT username FROM user WHERE username='{$username_pure}'";
    $result = $conn->query($query);
    if($result->num_rows === 0)
        die("Invalid username");
    else
       die("Invalid password");
}
$conn->close();

?>
