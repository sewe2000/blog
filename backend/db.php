<?php


$db_user = getenv("BLOG_DB_USER");
$db_passwd = getenv("BLOG_DB_PASSWD");
$db_name = getenv("BLOG_DB_NAME");
$connection_string = "mysql:host=localhost;dbname={$db_name}";

try {
    $pdo = new PDO($connection_string, $db_user, $db_passwd);
} catch(PDOException $e) {
    echo 'Database error. Code: '.$e->getCode();
    exit(1);
}

function exec_query($query, $params = []) {
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute($params);
    return $statement;
}

function fetch_results($query, $params = []) {
    return exec_query($query,$params)->fetchAll(PDO::FETCH_ASSOC);
}

function get_row_count($query, $params = []) {

    return exec_query($query, $params)->rowCount();
}
?>
