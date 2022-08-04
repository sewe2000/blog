<?php
require_once "sql_admin_credentials.php";

$hasEmail = false;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['username'], $_POST['pass'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
}
if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $hasEmail = true;
}
$connection = mysqli_connect($host, $user, $password, $db_name);
if($connection->connect_error) {
    die("Couldn't connect with the database. Error: ".$connection->connect_errno);
}

/* Insert new user into the table */

$pass = mysqli_real_escape_string($connection, $pass);
$query = "INSERT INTO user VALUES('{$username}', SHA2('{$pass}', 256),";
if(isset($email)) 
    $query .= "'{$email}')";
else
    $query .= "NULL)";
if ($connection->query($query) === false)
    echo "Error: ".$connection->errno;

if($hasEmail)
    mail($email, "Witaj na blogu sewe-hub!", "Serdecznie dziękuję za rejestrację na moim blogu. Od teraz możesz dodawać komentarze pod postami ;)");

header("Location: ../");
$connection->close();
?>
