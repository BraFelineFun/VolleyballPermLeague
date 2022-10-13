<?php
require_once '../Helpers/DB.php';
require_once '../Helpers/table_sort.php';
require_once 'drawTable.php';
require_once '../Helpers/isLoggedIn.php';


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
    <link rel="stylesheet" href="../Resources/styles/pages/administration/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="../Resources/js/index.js"></script>

    <title> Администрирование | Interior. </title>
</head>
<body pageName ='<?= basename($_SERVER["SCRIPT_FILENAME"], ".php") ?>'>

<?php

$table = "users";

if (isset($_GET['table'])){
    $table = $_GET['table'];
}

?>

<header>
    <nav>
        <a href="?table=users">users</a>
        <a href="?table=news">news</a>
        <a href="?table=prices">prices</a>
    </nav>
</header>

<main class="adminMain containerNarrow">
    <section class="section__admin">

        <div class="title-header">
            <?= $table?>
        </div>


        <?php
            $drawnTable = drawTable($table);
            echo $drawnTable;
        ?>


    </section>
</main>

</body>
</html>
