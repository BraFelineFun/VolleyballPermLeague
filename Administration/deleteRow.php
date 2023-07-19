<?php
require_once '../workFiles/config.php';
require_once '../Helpers/DB.php';
require_once '../Helpers/isLoggedIn.php';
require_once '../UI/fullErrorDisplay.php';

if ($_SESSION['userRole'] !== 'admin')
    header("Location:/");


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../Resources/styles/style.css">
    <link rel="stylesheet" href="../Resources/styles/normalize.css">
    <link rel="stylesheet" href="../Resources/styles/headerStyle.css">
    <link rel="stylesheet" href="../Resources/styles/footer.css">
    <link rel="stylesheet" href="../Resources/styles/errorMessage.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">


    <title> Администрирование | Volley. </title>
</head>
<body>
<?php

$id = $_GET['id'];
$table = $_GET['table'];

$query = "DELETE FROM `$table` WHERE id = ?";
$executed = true;
try {
    DB::getAdapter();
    DB::executeStatement($query, [$id]);
} catch (Exception $e) {
    echo fullDisplayError($e, "Ошибка при удалении записи");
    $executed = false;
}

if ($executed){
    header("Location:/Administration/index.php?table=$table");
}
die();
?>


</body>
</html>
