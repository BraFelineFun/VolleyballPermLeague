<?php
require_once '../Helpers/DB.php';
require_once '../Helpers/isLoggedIn.php';


$id = $_GET['id'];
$table = $_GET['table'];

$query = "DELETE FROM `$table` WHERE id = $id";

echo $query;

$executed = true;
try {
    executeSQL($query);
} catch (Exception $e) {
    echo $e;
    $executed = false;
}

if ($executed){
    header("Location:/Administration/index.php?table=$table");
}
