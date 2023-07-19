<?php
require_once '../workFiles/config.php';
require_once '../Helpers/DB.php';
require_once '../Helpers/table_sort.php';
require_once 'drawTable.php';
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
    <link rel="stylesheet" href="../Resources/styles/pages/administration/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <script defer src="../Resources/js/index.js"></script>

    <title> Администрирование | Volley. </title>
</head>
<body pageName ='<?= basename($_SERVER["SCRIPT_FILENAME"], ".php") ?>'>

<?php

$tables = [];
try {
    DB::getAdapter();
    $db_config = include(__ROOT__ . 'workFiles/config.php');
    $tables = DB::executeSQL("SELECT table_name FROM information_schema.tables WHERE table_schema = '" . $db_config['database']['database'] ."';");
    foreach ($tables as $index => $tb){
        $tables[$index] = $tb['TABLE_NAME'];
    }
}
catch (Exception $e) {
    echo fullDisplayError($e, "Обращение к базе данных");
    die();
}
$table = $tables[0];

if (isset($_GET['table']) && in_array($_GET['table'], $tables, true)){
    $table = $_GET['table'];
}
?>

<header>
    <nav>
        <?php foreach ($tables as $tableItem): ?>
        <a href='?table=<?=$tableItem?>'>
            <?=$tableItem?>
        </a>
        <span>|</span>
        <?php endforeach;?>

    </nav>
</header>

<main class="adminMain containerNarrow">
    <section class="section__admin">

        <div class="title-header">
            <?= $table ?>
        </div>


        <?php
            $drawnTable = drawTable($table);
            echo $drawnTable;
        ?>


    </section>
</main>

</body>
</html>
