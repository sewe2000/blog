<?php
require_once 'db.php';

$hasEmail = false;

if(isset($_POST['username'], $_POST['pass'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
}
if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $hasEmail = true;
}

/* Insert new user into the table */

$query = "INSERT INTO user VALUES(:username, SHA2(:pass, 256),";
$params = ['username' => $username, 'pass' => $pass];

if(isset($email)) {
    $query .= ":email)";
    $params['email'] = $email;
}
else
    $query .= "NULL)";

exec_query($query, $params);
if($hasEmail)
    mail($email, "Witaj na blogu sewe-hub!", "Serdecznie dziękuję za rejestrację na moim blogu. Od teraz możesz dodawać komentarze pod postami ;)");

header("Location: ../");
?>
